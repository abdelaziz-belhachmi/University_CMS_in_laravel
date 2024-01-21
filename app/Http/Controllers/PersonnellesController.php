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


function get($id){

    $person = User::findOrFail($id);
    $prole= $person->role;

    switch ($prole) {
        case 0:
            $details = Etudiant::where('user_id', $id)->first();
            return view('Auth.personnelles.modifier',compact('details','prole'));
        break;
        
        case 1:
            $details = Professeur::where('user_id', $id)->first();
            return view('Auth.personnelles.modifier',compact('details','prole'));
           break;


        case 2:
/*

a revoir

*/           
        break;

        case 3:
        /*

a revoir

*/      
        break;
    
        case 4:
          /*

a revoir

*/      
        break;
                
        default:
           /*

a revoir

*/      
            break;
    }

}

function delete($id){

    $user = User::where('id',$id)->first();

    switch ($user->role) {
        case 0:
            $e = Etudiant::where('user_id',$id)->first();
            $e->delete();
            break;
        
            case 1:
                $p = Professeur::where('user_id',$id)->first();
                $p->delete();
                break;   

        default:
            # code...
            /*
            
            a revoir
            
            
            */
            break;
    }

    $user->delete();

    return redirect(route('gerer_perso'));
}

function edit(Request $request){
    /*
    
    
    A revoir

    
    */
    return redirect(route('gerer_perso'));
}


}
