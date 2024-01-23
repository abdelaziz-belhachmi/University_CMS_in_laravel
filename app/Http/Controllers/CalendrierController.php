<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendrierController extends Controller
{
    function calendrier (){
     return view('Auth/reservation/calendrier');
    }
}
