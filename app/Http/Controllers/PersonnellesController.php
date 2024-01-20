<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\User;
use Illuminate\Http\Request;

class PersonnellesController extends Controller
{
    //
    function index(){
        $utilisateurs = [];
        return view('Auth.personnelles.gerer_personnelles',compact('utilisateurs'));
    }

function etudiants(){

    $utilisateurs = Etudiant::all();
    return view('Auth.personnelles.gerer_personnelles',compact('utilisateurs'));
}


function Proffesseurs(){
    $utilisateurs = Professeur::all();
    return view('Auth.personnelles.gerer_personnelles',compact('utilisateurs'));
}

function Chef_Departements(){
    $utilisateurs = [];

    return view('Auth.personnelles.gerer_personnelles',compact('utilisateurs'));

}

function Chef_Filieres(){
    $utilisateurs = [];

    return view('Auth.personnelles.gerer_personnelles',compact('utilisateurs'));

}

function Chef_Services(){
    $utilisateurs = [];

    return view('Auth.personnelles.gerer_personnelles',compact('utilisateurs'));

}


function edit($id){

    $person = User::findOrFail($id);
    $prole= $person->role;

    switch ($prole) {
        case 0:
            $studentDetails = Etudiant::where('user_id', $id)->first();

        break;
        
        case 1:
            # code...
        break;


        case 2:
            # code...
        break;

        case 3:
            # code...
        break;
    
        case 4:
            # code...
        break;
                
        default:
            # code...
            break;
    }

}


}
