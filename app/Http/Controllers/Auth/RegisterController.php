<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    // use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $r){
     
    //   $this->validator($r->all())->validate();

      $user = $this->create($r->all());
        $name = "".$user->name;
        return view('/Auth/home',compact('name'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'between:0,4'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['first_name'],
            'prenom' => $data['last_name'],
            'numero_telephone' => $data['phone'],
            'date_naissance' => $data['birthdate'],
            'email' => $data['email'],
            'cin' =>$data['cin'],
            'password' => Hash::make($data['password']),
            'role' =>(int) $data['role'],
        ]);

        switch ( (int) $data['role']) {
            case 0: // Student
                $user->etudiant()->create(['code_apogee' => $data['apogee']]);
                break;
            case 1: // professeur
                $user->professeur()->create(['code_doti' => $data['code_doti']]);
                break;
            default:
                // $user->chefFiliere()->create(['specific_field' => $data['chef_filiere_specific_field']]);
                break;
            // Add cases for other roles
        }

        return $user;
    }
}
