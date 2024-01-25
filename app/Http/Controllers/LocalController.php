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
        $departements = Departement::all();
       return view('Auth/locals/gerer',compact('locaux','departements'));
    }

    function newForm(){
       
        $All_departements = Departement::all();

        return view('Auth/locals/new',compact('All_departements'));
    }
 
    function new(Request $r){
        
        $rules = [
            'code_local' => 'required|unique:locals,Code_local',
            'nom_local' => 'required',
            'loc_type' => 'required',
        ];
    
        // Validate the input data
        $r->validate($rules);

        $data = [
            'Code_local'=>$r->input('code_local'),
            'Nom_local' => $r->input('nom_local'),
            'Type_local' => $r->input('loc_type'),
            'departement_id' => $r->has('dep') ? $r->input('dep') : null,
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

    function associer($idLocal,$idDep){

       $l = local::where('id',$idLocal)->first();
       $l->departement_id = $idDep;
       $l->save();
       return redirect(route('gere_locals'));
    }
    
}