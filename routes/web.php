<?php

use App\Http\Controllers\AnnonceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\FilieresController;
use App\Http\Controllers\PersonnellesController;
use App\Models\Departement;
use GuzzleHttp\Promise\Create;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*HOME*/ 
Route::get('/' ,  function () { return view('welcome');}   )->name('welcome');

Route::get('/home', function () {
    if(Auth::user()->role == 0 ){ return redirect('user/home');}
    else{  return redirect('Auth/home/accueil');}
})->name('home');

Route::get('/Auth/home',function () {
    return view('Auth.home');
})->name('Auth.home');

// login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// register
Route::get('/Auth/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/Auth/register', [RegisterController::class, 'register']);

// admin home
Route::get('/Auth/home/accueil',[AnnonceController::class,'index'] )->name('Auth.accueil');

// student home
Route::get('/user/home', function () {
    return view('user.home');
})->name('user.home');

//logout
Route::get('/logout', [LoginController::class, 'logout'] )->name('Logout');


// Route::get('/Auth/home/annonce/gerer_annonces',function () {
//     return view('Auth.annonce.gerer_annonces');
// })->name('Auth.annonce.gerer_annonces');


//*crud annonce*//
// cree une nouvell annonce
Route::get('/Auth/home/annonce/cree_annonce',function () {
    return view('Auth.annonce.cree_annonce');
})->name('Auth.annonce.cree_annonce');

Route::post('/Auth/home/annonce/cree_annonce',[AnnonceController::class , "store"]);

// supprimer
Route::get('Auth/supprimer_annonce/{id}',[AnnonceController::class,"destroy"]);

// modifier
Route::get('Auth/modifier_annonce/{id}',[AnnonceController::class,"showOne"]);
Route::post('Auth/modifier_annonce',[AnnonceController::class,"edit"]);

// voir mes annonces
Route::get('/Auth/home/annonce/gerer_annonces', [AnnonceController::class , 'showAll'] )->name('Auth.annonce.gerer_annonces');

 
// ** PERSONNELLES ** //
Route::get('Auth/gerer/personnes/',[PersonnellesController::class,'index'])->name('gerer_perso');
Route::get('Auth/gerer/etudiants',[PersonnellesController::class,'etudiants']);
Route::get('Auth/gerer/Proffesseurs',[PersonnellesController::class,'Proffesseurs']);
Route::get('Auth/gerer/Chef_Filieres',[PersonnellesController::class,'Chef_Filieres']);
Route::get('Auth/gerer/Chef_Departements',[PersonnellesController::class,'Chef_Departements']);
Route::get('Auth/gerer/Chef_Services',[PersonnellesController::class,'Chef_Services']);

Route::get('personnelles/modifier/{id}',[PersonnellesController::class,'get']);
Route::post('personnelles/modifier/',[PersonnellesController::class,'edit'])->name('update_user_info');

Route::get('personnelles/supprimer/{id}',[PersonnellesController::class,'delete'])->name('delete_user');


// * gere_departements * //
Route::get('Auth/departements/gerer',[DepartementController::class,'getAll'])->name('gere_departements');
Route::get('Auth/departements/new',[DepartementController::class,'Afficher_formulaire'])->name('Afficher_formulaire_dep');
Route::post('/Auth/new/dep',[DepartementController::class,'create']);

Route::get('/Auth/departements/edit/{id}',[DepartementController::class,'getOne']);
Route::post('/Auth/edit/dep',[DepartementController::class,'edit']);
Route::get('/Auth/departements/delete/{id}',[DepartementController::class,'delete']);


// * gere_filieres * //
Route::get('/Auth/filieres/gerer',[FilieresController::class,'getAll'])->name('gere_filieres');
Route::get('Auth/filiers/new',[FilieresController::class,'newForm'])->name('new_filiere');
Route::post('Auth/filiers/new',[FilieresController::class,'new']);

Route::get('Auth/filiers/edit/{id}',[FilieresController::class,'getOne']);
Route::post('Auth/filiers/edit',[FilieresController::class,'edit']);

Route::get('Auth/filiers/delete/{id}',[FilieresController::class,'delete']);

// **  ** //
Route::get('Auth/reservation/calendrier',[CalendrierController::class,'calendrier']);




// POST "/reserver/${anne}/${mois}/${jours}/${creneau}/${local}" 