<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    function profil(){

        $user = Auth::user();
        $etudiant = Etudiant::where('user_id',$user->id)->first();
        return view('user.profil',compact('user','etudiant'));
    }

    function accueil(){
        $myRole = Auth::user()->role;
        
        switch ($myRole) {
            case 0:
                $userRole = "etudiants";
                break;
            case 1:
                $userRole = "professeurs";
                break;
            case 2:
                $userRole = "chef_filliere";
                break;
            case 3:
                $userRole = "chef_departement";
                break;
            case 4:
                $userRole = "chef_service";
                break;
            default:
                $userRole = "etudiants";
        }

        $annonces = Annonce::whereHas('audience', function ($query) use ($userRole) {
                
            $query->where($userRole, true);

        })->with(['audience', 'user'])->get();

        return view('user.accueil', compact('annonces'));
    }
    
}
