<?php

namespace App\Http\Controllers;

use App\Models\local;
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

             if(Auth::user()->role == 3){

            $depID = Auth::user()->Chef_Departement->departement_id ;

            $mylocals = Local::where('departement_id',$depID)->get();

            $reservationDuJour = reservation::where('year', $year)
            ->where('month', $month)
            ->where('day', $day)
            ->where('start_time',$hour)
            ->get();
    
            $reservedLocalIds = $reservationDuJour->pluck('local_id')->toArray();
    
                // Get reserved locals from myLocals
                $locauxreserve = $mylocals->whereIn('id', $reservedLocalIds);

                // Get free locals from myLocals
                $locauxLibres = $mylocals->whereNotIn('id', $reservedLocalIds);
             
            // hna tle3 ga3 les sales li 3andom dep id 3la departement diali , 7it ana hua chef d dep
            
            return view('Auth/reservation/locauxLibres',compact('year','month','day','hour','locauxLibres','locauxreserve'));
        }
        else if(Auth::user()->role == 4){
            // hna tle3 ga3 les sales li ma3andomch dep
            $mylocals = Local::whereNull('departement_id')->get();
            
            $reservationDuJour = reservation::where('year', $year)
            ->where('month', $month)
            ->where('day', $day)
            ->where('start_time',$hour)
            ->get();
    
            $reservedLocalIds = $reservationDuJour->pluck('local_id')->toArray();
    

              // Get reserved locals from myLocals
              $locauxreserve = $mylocals->whereIn('id', $reservedLocalIds);

              // Get free locals from myLocals
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
