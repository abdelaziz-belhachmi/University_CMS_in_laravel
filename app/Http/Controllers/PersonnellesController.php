<?php

namespace App\Http\Controllers;

use App\Models\Chef_Departement;
use App\Models\Chef_filiere;
use App\Models\Chef_Service;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    $utilisateurs = Chef_Departement::all();

    return view('Auth.personnelles.gerer_personnelles',compact('utilisateurs'));

}

function Chef_Filieres(){
    $utilisateurs = Chef_filiere::all();

    return view('Auth.personnelles.gerer_personnelles',compact('utilisateurs'));

}

function Chef_Services(){
    $utilisateurs = Chef_Service::all();

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
            $details = Chef_filiere::where('user_id',$id)->first();
            return view('Auth.personnelles.modifier',compact('details','prole'));
        break;

        case 3:
            $details = Chef_Departement::where('user_id',$id)->first();
            return view('Auth.personnelles.modifier',compact('details','prole'));
        break;
    
        case 4:
            $details = Chef_Service::where('user_id',$id)->first();
            return view('Auth.personnelles.modifier',compact('details','prole'));
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


        case 2:
            $p = Chef_filiere::where('user_id',$id)->first();
            $p->delete();
        break;   

        case 3:
                $p = Chef_Departement::where('user_id',$id)->first();
                $p->delete();
        break;   
        case 4:
                $p = Chef_Service::where('user_id',$id)->first();
                $p->delete();
        break;   

    }

    $user->delete();

    return redirect(route('gerer_perso'));
}


public function edit(Request $request)
{
    $id = $request->input('id');

    $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'password' => ['required', 'string'],
    ]);

    // try {
        $user = User::find($id);

        $user->name = $request->input('first_name');
        $user->prenom = $request->input('last_name');
        $user->numero_telephone = $request->input('phone');
        $user->date_naissance = $request->input('birthdate');
        $user->adresse = $request->input('address');
        $user->ville = $request->input('city');
        $user->code_postale = $request->input('zip');
        $user->cin = $request->input('cin');
        $user->password = Hash::make($request->input('password'));
    
        $user->save();

     
        return redirect(route('gerer_perso'))->with('success', 'User information updated successfully.');
 
}

}
