<?php

namespace App\Http\Controllers;

use App\Models\Chef_Departement;
use App\Models\Chef_filiere;
use App\Models\Departement;
use App\Models\filiere;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartementController extends Controller
{
    //

    function Afficher_formulaire()
    {
        return view('Auth/departements/new');
    }

    function getAll(){
        if(Auth::user()->role == 4){
            $dep = Departement::all();
        }
        else if(Auth::user()->role == 3) {
            $mondep = Auth::user()->Chef_Departement->departement_id;
            $dep = Departement::where('id',$mondep)->get();
              }
       
        
        return view('Auth/departements/gerer',compact('dep'));
    }


    function getOne($id){
        $de = Departement::where('id',$id)->first();
        return view( 'Auth/departements/modifier' , compact('de'));
    }



    function edit(Request $r)  {
        // $newdata = [
        //     'Code_departement' => $r->input('code'),
        //     'Nom_departement' =>$r->input('nom'),
        //     'Description' => $r->input('desc'),
        // ];
        
        $depa = Departement::findOrFail($r->input('id'));

        $depa->Code_departement = $r->input('code');
        $depa->Nom_departement = $r->input('nom');
        $depa->Description = $r->input('desc');

        $depa->save();
        return $this->getAll();
    }



    function create(Request $r){
        $data = [
            'Code_departement' => $r->input('code'),
            'Nom_departement' =>$r->input('nom'),
            'Description' => $r->input('desc'),
        ];
         Departement::create($data);
        return $this->getAll();
    }


    
    function delete($id){
        $de = Departement::where('id',$id)->first();
        $allfilieres = filiere::where('departement_id',$id)->get();
        
        foreach ( $allfilieres as $filiere) {
            $this->deleteFiliere($filiere->id);
            // $filiere->delete();
        }

        $ChefID = Chef_Departement::where('departement_id',$id)->first();

        if($ChefID){
            $ChefID->delete();
        }

        $de->delete();
        
        return $this->getAll();
    }


    function deleteFiliere($id){

        $f = filiere::where('id',$id)->first();

        $ChefID = Chef_filiere::where('filieres_id',$id)->first();
        
        if ($ChefID) {
            $u  = User::where('id',$ChefID->user_id)->first();      
            $ChefID->delete();
            $u->delete();
    }
    
        $f->delete();

        // return $this->getAll();
    }



    
}
