<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    //

    function getAll(){
        $locaux = local::all();
       return view('Auth/locals/gerer',compact('locaux'));
    }

    function newForm(){
       
        $All_departements = Departement::all();

        return view('Auth/locals/new',compact('All_departements'));
    }
 
    function new(Request $r){
        
        $data = [
            'Code_local'=>$r->input('code_local'),
            'Nom_local' => $r->input('nom_local'),
            'Type_local' => $r->input('loc_type'),
            'departement_id' => $r->input('dep')
        ];

        local::create($data);
        return $this->getAll();
    }
    
}