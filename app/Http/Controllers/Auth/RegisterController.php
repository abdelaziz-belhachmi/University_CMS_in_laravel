<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Chef_filiere;
use App\Models\Departement;
use App\Models\filiere;
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
        // $departementsLibres = Departement::all(); 
        /* hna khassni n returner data d filieres w departements bla chefs */

        $departementsLibres = Departement::whereDoesntHave('chefDepartement')->get();

        $filieresLibres =  filiere::whereDoesntHave('chefFiliere')->get();

        return view('auth.register',compact('departementsLibres','filieresLibres'));
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
            'adresse' => $data['address'],
            'ville' => $data['city'],
            'code_postale' => $data['zip'],
            'cin' =>$data['cin'],
            'email' => $data['email'],
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

            case 2: // Chef filliere

                $user->Chef_filiere()->create([ 'code_Chef' => $data['code_Chef'] ,'filieres_id' => $data['filiere'] ]);
                break;
            case 3: // Chef departement

                $user->Chef_Departement()->create([ 'code_Chef' => $data['code_Chef'] ,'departement_id' => $data['dep'] ]);

                break;
            case 4: // Chef service

                $user->Chef_Service()->create([ 'code_Chef' => $data['code_Chef'] ]);

                break;

        }

        return $user;
    }
}
