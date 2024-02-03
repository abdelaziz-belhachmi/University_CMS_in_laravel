<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\filiere;
use App\Models\local;
use App\Models\module;
use App\Models\reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Locale;

class CalendrierController extends Controller {

    function calendrier (){
     return view('Auth/reservation/calendrier');
    }


    function creneau($year,$month,$day){

        return view('Auth/reservation/creneau',compact('year','month','day'));
    }

    function emploiDutemps(){

        $today = now();
        $nextWeek = $today->copy()->addWeek();
        $structuredReservations = [];
    
        foreach (["9", "11", "13", "15", "17"] as $startTime) {
            $reservationsForStartTime = [];
    
            for ($day = $today->copy(); $day->lte($nextWeek); $day->addDay()) {
                $reservationsForDay = Reservation::where('day', $day->day)
                    ->where('month', $day->month)
                    ->where('year', $day->year)
                    ->where('start_time', $startTime)
                    ->get();
    
                $userRole = Auth::user()->role;
    
                if ($userRole == 0) {

                    $userClassId = Auth::user()->etudiant->classes_id;    
                    
                    $reservationsForDay = $reservationsForDay->where('classes_id', $userClassId);
                
                }elseif ($userRole == 1 ) {

                    $modules = module::where('professeurs_id',Auth::user()->professeur->id)->first();

                    $modulesID = $modules->id;

                    $reservationsForDay = $reservationsForDay->where('modules_id', $modulesID);

                } elseif ($userRole == 2) {

                    $reservationsForDay = $reservationsForDay->where('user_id', Auth::user()->id);

                } elseif ($userRole == 3) {
                    
                    $userDepartementId = Auth::user()->Chef_Departement->departement_id;
    
                    $reservationsForDay = $reservationsForDay->filter(function ($reservation) use ($userDepartementId) {
                        return $reservation->local->departement_id == $userDepartementId;
                    });

                } elseif ($userRole == 4) {

                    // Filter reservations by locals that belong to null departement ID
                    $reservationsForDay = $reservationsForDay->filter(function ($reservation) {
                        return $reservation->local->departement_id == null;
                    });

                }
    
                $reservationsForStartTime[$day->format('d/m/Y')] = $reservationsForDay;
            }
    
            $structuredReservations[$startTime] = $reservationsForStartTime;
        }
    
        if (Auth::user()->role == 0) {
            // etudiant , il va voir que les réservations concernent ses modules 
            return view('/user/emploi', compact('structuredReservations'));
        } else {
            // chef dep ou chef filiere ou prof , ils vont voir le calendrier des salles du département et ses réservations 
            return view('/Auth/emploi', compact('structuredReservations'));
        } 
    }

    function groups($year,$month,$day,$hour,$module){

            $classesWithoutAnyReservation = Classe::doesntHave('reservations')->get();

            $classesWithoutSpecificReservation = Classe::whereDoesntHave('reservations', function ($query) use ($year, $month, $day, $hour) {
                $query->where('year', $year)
                    ->where('month', $month)
                    ->where('day', $day)
                    ->where('start_time', $hour);
            })->get();
            
            $combClasses = $classesWithoutAnyReservation->merge($classesWithoutSpecificReservation);

            $combinedClasses = $combClasses->filter(function ($class) use ($module) {
                return $class->modules->where('id', $module)->isNotEmpty();
            });

            return response()->json($combinedClasses);
    }
        


    function locaux($year,$month,$day,$hour){

             if(Auth::user()->role == 3){// chef dep 

            $depID = Auth::user()->Chef_Departement->departement_id ;

            $mylocals = Local::where('departement_id',$depID)->get();

            $reservationDuJour = reservation::where('year', $year)
            ->where('month', $month)
            ->where('day', $day)
            ->where('start_time',$hour)
            ->get();

           
            // // *******
            // $moduleswithoutSpecificReservation = module::whereDoesntHave('reservations',function ($query) use ($year, $month, $day, $hour) {
            //     $query->where('year', $year)
            //         ->where('month', $month)
            //         ->where('day', $day)
            //         ->where('start_time', $hour);
            // })->get();

            // $moduleswithoutReservation = module::whereDoesntHave('reservations')->get();

            // $modules = $moduleswithoutReservation->merge($moduleswithoutSpecificReservation);
            // // ********

                $departmentId = $depID; // Assuming you have the department ID of the logged-in user

                $moduleswithoutSpecificReservation = Module::whereHas('filiere', function ($query) use ($departmentId) {
                $query->where('departement_id', $departmentId);
                })
                 ->whereDoesntHave('reservations', function ($query) use ($year, $month, $day, $hour) {
                    $query->where('year', $year)
                    ->where('month', $month)
                    ->where('day', $day)
                    ->where('start_time', $hour);
                })
                 ->get();

                $moduleswithoutReservation = Module::whereHas('filiere', function ($query) use ($departmentId) {
                      $query->where('departement_id', $departmentId);
                })
                    ->whereDoesntHave('reservations')
                    ->get();

                $modules = $moduleswithoutReservation->merge($moduleswithoutSpecificReservation);


            // *************

            $reservedLocalIds = $reservationDuJour->pluck('local_id')->toArray();
    
                $locauxreserve = $mylocals->whereIn('id', $reservedLocalIds);

                $locauxLibres = $mylocals->whereNotIn('id', $reservedLocalIds);


                         
            return view('Auth/reservation/locauxLibres',compact('year','month','day','hour','locauxLibres','locauxreserve','modules'));
        }

        else if(Auth::user()->role == 4){
            $mylocals = Local::whereNull('departement_id')->get();
            
            $reservationDuJour = reservation::where('year', $year)
            ->where('month', $month)
            ->where('day', $day)
            ->where('start_time',$hour)
            ->get();
    
              $reservedLocalIds = $reservationDuJour->pluck('local_id')->toArray();
    
              $locauxreserve = $mylocals->whereIn('id', $reservedLocalIds);

              $locauxLibres = $mylocals->whereNotIn('id', $reservedLocalIds);
           
            return view('Auth/reservation/locauxLibres',compact('year','month','day','hour','locauxLibres','locauxreserve'));
        }

        else if( Auth::user()->role == 2){
                $filiereID = Auth::user()->Chef_filiere->filieres_id;
                $filiere = filiere::where('id',$filiereID)->first();
                $depID = $filiere->departement_id;

                $mylocals = Local::where('departement_id',$depID)->get();

            $reservationDuJour = reservation::where('year', $year)
            ->where('month', $month)
            ->where('day', $day)
            ->where('start_time',$hour)
            ->get();
    
            $reservedLocalIds = $reservationDuJour->pluck('local_id')->toArray();
    
                $locauxreserve = $mylocals->whereIn('id', $reservedLocalIds);

                $locauxLibres = $mylocals->whereNotIn('id', $reservedLocalIds);
                         
            return view('Auth/reservation/locauxLibres',compact('year','month','day','hour','locauxLibres','locauxreserve'));
        }

        else if( Auth::user()->role == 1){
            $profID = Auth::user()->professeur->id;
         
            $module = module::where('professeurs_id',$profID)->first();
         
            $filiereID = $module->filiere_id;

            $filiere = filiere::where('id',$filiereID)->first();

            $depID = $filiere->departement_id;

            $reservationDuJour = reservation::where('year', $year)
                ->where('month', $month)
                ->where('day', $day)
                ->where('start_time',$hour)
                ->get();

            $mylocals = Local::where('departement_id',$depID)->get();

            $reservedLocalIds = $reservationDuJour->pluck('local_id')->toArray();

            $locauxreserve = $mylocals->whereIn('id', $reservedLocalIds);

            $locauxLibres = $mylocals->whereNotIn('id', $reservedLocalIds);
                     
        return view('Auth/reservation/locauxLibres',compact('year','month','day','hour','locauxLibres','locauxreserve'));
           }
       
    else{
            return redirect(route('home'));
        }
    } 

function toutesLesSalesReserveDansJour($year,$month,$day){
    $reservationDuJour = reservation::where('year', $year)
    ->where('month', $month)
    ->where('day', $day)
    ->get();
    $reservedLocalIds = $reservationDuJour->pluck('local_id')->toArray();

    $locauxreserve = Local::where('id', $reservedLocalIds)->get();

    return $locauxreserve;
}

function reserver(Request $r){

  if($r->input('recurr') == 'oui'){

    $desiredDate = Carbon::create($r->input('year'), $r->input('month'), $r->input('day'));

    for ($x = 0; $x < 23; $x++) {
        $newYear = $desiredDate->year;
        $newMonth = $desiredDate->month;
        $newDay = $desiredDate->day;
    
        $data = [
            'Titre_reservation' => $r->input('Titre_reservation'),
            'sujet_reservation' => $r->input('sujet_reservation'),
            'start_time' => $r->input('hour'),
            'day' => $newDay,
            'month' => $newMonth,
            'year' => $newYear,
            'local_id' => $r->input('local_id'),
            'classes_id' => $r->input('classe') ?? null,
            'modules_id' => $r->input('modules') ?? null,
            'user_id' => Auth::user()->id
        ];
        $res = reservation::create($data);
        $res->modules_id = $r->input('modules');
        $res->save();
        
        $desiredDate->addDays(7);

    }
    
}
else
{
    
    $data = [
        'Titre_reservation'=> $r->input('Titre_reservation'),
        'sujet_reservation'=> $r->input('sujet_reservation'),
        'start_time'=> $r->input('hour'),
        'day'=> (int)$r->input('day'),
        'month'=> (int)$r->input('month'),
        'year'=> (int)$r->input('year'),
        'local_id'=> $r->input('local_id'),
        'classes_id' => $r->input('classe') ?? null,
        'modules_id' => $r->input('modules') ?? null,
        'user_id' => Auth::user()->id
    ];

    // dd($data);

$res = reservation::create($data);

$res->modules_id = $r->input('modules');
$res->save();
} 



return redirect(route('Auth.accueil'));
}

}