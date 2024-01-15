<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    function login(Request $req){
        // return view('login');
        // $req->user()-> 
        $u = User::where('email', $req->email)->first();
        if($u){
            return "welcome back , ".$u->name;
        }else{
            return view('welcome');
        }
    }

    function showLoginForm(){
        return view('login');
    }
}
