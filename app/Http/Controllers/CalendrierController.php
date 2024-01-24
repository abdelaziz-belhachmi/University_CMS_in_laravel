<?php

namespace App\Http\Controllers;

use App\Models\local;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendrierController extends Controller
{

    function calendrier (){
     return view('Auth/reservation/calendrier');
    }


    function creneau($year,$month,$day){

        return view('Auth/reservation/creneau',compact('year','month','day'));
    }

    function locaux($year,$month,$day,$hour){

        $reservationDuJour = reservation::where('year', $year)
        ->where('month', $month)
        ->where('day', $day)
        ->where('start_time',$hour)
        ->get();

        $reservedLocalIds = $reservationDuJour->pluck('local_id')->toArray();

        // Get all locals that are not reserved for the specified date and time
        $locauxLibres = Local::whereNotIn('id', $reservedLocalIds)->get();

        // all locals reserved in that specific time and date
        $locauxreserve = Local::where('id', $reservedLocalIds)->get();

        // !!! nsit ma3andich crud dial les sales , blaty ncree sales !!!

        return view('Auth/reservation/locauxLibres',compact('year','month','day','hour','locauxLibres','locauxreserve'));
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
