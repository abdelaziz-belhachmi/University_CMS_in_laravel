<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    function login(Request $req){
        // return view('login');
        // $req->user()-> 


        $req->validate([
            'email'=>'required',
            'password' => 'required'
        ]);

        $credentials = $req->only('email','password');

        if(Auth::attempt($credentials)){
        $u = User::where('email', $req->email)->first();
            if($u->role != 0 ){
            // return "welcome back , ".$u->name;
            return redirect()->intended(route('Auth.home'));
        }else {
            return redirect()->intended(route('user.home'));

        }

        }else{
            return redirect(route('welcome'))->with('error','Login details Incorrect !');
        }
    }

    function showLoginForm(){
        return view('login');
    }

    function logout(){
        // Session::flush();
        Auth::logout();
        return redirect(route('welcome'));
    }
}
