<?php

namespace App\Http\Controllers;

use App\Models\filiere;
use App\Models\local;
use App\Models\module;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Locale;

class CalendrierController extends Controller
{

    function calendrier (){
     return view('Auth/reservation/calendrier');
    }


    function creneau($year,$month,$day){

        return view('Auth/reservation/creneau',compact('year','month','day'));
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
    
            $reservedLocalIds = $reservationDuJour->pluck('local_id')->toArray();
    
                $locauxreserve = $mylocals->whereIn('id', $reservedLocalIds);

                $locauxLibres = $mylocals->whereNotIn('id', $reservedLocalIds);
                         
            return view('Auth/reservation/locauxLibres',compact('year','month','day','hour','locauxLibres','locauxreserve'));
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

    $data = [
        'Titre_reservation'=> $r->input('Titre_reservation'),
        'sujet_reservation'=> $r->input('sujet_reservation'),
        'start_time'=> $r->input('hour'),
        'day'=> (int)$r->input('day'),
        'month'=> (int)$r->input('month'),
        'year'=> (int)$r->input('year'),
        'local_id'=> $r->input('local_id'),
        'user_id' => Auth::user()->id
    ];

    reservation::create($data);
    
return redirect(route('Auth.accueil'));
}

}
