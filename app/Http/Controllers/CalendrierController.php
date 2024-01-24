<?php

namespace App\Http\Controllers;

use App\Models\local;
use App\Models\reservation;
use Illuminate\Http\Request;

class CalendrierController extends Controller
{
    function calendrier (){
     return view('Auth/reservation/calendrier');
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
        
        // !!! nsit ma3andich crud dial les sales , blaty ncree sales !!!

        return view('Auth/reservation/creneau/locaux',compact('year','month','day','hour','locauxLibres'));
    }
    
    
    function creneau($year,$month,$day){

        return view('Auth/reservation/creneau',compact('year','month','day'));
    }
}
