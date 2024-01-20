<?php

use App\Http\Controllers\AnnonceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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
    else{  return redirect('Auth/home');}
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





// POST "/reserver/${anne}/${mois}/${jours}/${creneau}/${local}" 