<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\local;
use App\Models\materiaux;
use App\Models\reservation;
use Illuminate\Http\Request;
use Locale;

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

    function delete($id){

        $local = local::where('id',$id)->first();

        //check first if has a reservation 
        $r = reservation::where('local_id',$id)->get();
        foreach($r as $re){
            $re->delete();
        }

        // check for matariaux in the local
         $s = materiaux::where('local_id',$id)->get();
         foreach($s as $se){
             $se->delete();
         }

        //delete
        $local->delete();

        return $this->getAll();

    }
    
}