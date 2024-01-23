<?php

namespace App\Http\Controllers;

use App\Models\Chef_filiere;
use App\Models\Departement;
use App\Models\filiere;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class FilieresController extends Controller
{
    //

    function getAll(){

        $fil = filiere::all();
        
        return view('Auth/filieres/gerer',compact('fil'));
    }
    
    function newForm(){

        $All_departements = Departement::all();

        return view('Auth/filieres/new',compact('All_departements'));
    }
 
    function new(Request $r){
        $data = [
            'Code_filiere' => $r->input('code'),
            'Nom_filliere' =>$r->input('nom'),
            'description' => $r->input('desc'),
            'departement_id' => $r->input('dep')
        ];

        filiere::create($data);
        

        return $this->getAll();
    }

    function getOne($id){
        $filiere = filiere::where('id',$id)->first();
        $idd =  $filiere->departement_id;
        $depa = Departement::where('id',$idd)->first();
        return view( 'Auth/filieres/edit' , compact('filiere','depa'));
    }

    function edit(Request $r){

        $fili = filiere::findOrFail($r->input('id'));

        $fili->Code_filiere = $r->input('code');
        $fili->Nom_filliere = $r->input('nom');
        $fili->Description = $r->input('desc');

        $fili->save();

        return $this->getAll();
    }


    function delete($id){
        /* mse7 chef hua lwl, 7it ila 7ayedna filiere , b7al ila jrina 3la chef diala */

        $f = filiere::where('id',$id)->first();

        $ChefID = Chef_filiere::where('filieres_id',$id)->first();
        
        if ($ChefID) {
            $u  = User::where('id',$ChefID->user_id)->first();      
            $ChefID->delete();
            $u->delete();
    }
    
        $f->delete();

        return $this->getAll();
    }


}