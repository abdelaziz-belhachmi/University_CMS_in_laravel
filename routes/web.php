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

Route::get('/' ,  function () { return view('welcome');}   )->name('welcome');


Route::get('/home', function () {
    if(Auth::user()->role == 0 ){ return redirect('user/home');}
    else{  return redirect('Auth/home');}
})->name('home');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/Auth/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/Auth/register', [RegisterController::class, 'register']);


Route::get('/Auth/home',function () {
    return view('Auth.home');
})->name('Auth.home');

// Route::get('/Auth/home/annonce/gerer_annonces',function () {
//     return view('Auth.annonce.gerer_annonces');
// })->name('Auth.annonce.gerer_annonces');

// voir mes annonces
Route::get('/Auth/home/annonce/gerer_annonces', [AnnonceController::class , 'show'] )->name('Auth.annonce.gerer_annonces');

// cree une nouvell annonce
Route::get('/Auth/home/annonce/cree_annonce',function () {
    return view('Auth.annonce.cree_annonce');
})->name('Auth.annonce.cree_annonce');

// save new annonce
Route::post('/Auth/home/annonce/cree_annonce',[AnnonceController::class , "store"]);

Route::get('Auth/supprimer_annonce/{id}',[AnnonceController::class,"destroy"]);

// Route::get('/Auth/home/accueil',function () {
//     return view('Auth.accueil');
// })->name('Auth.accueil');

Route::get('/Auth/home/accueil',[AnnonceController::class,'index'] )->name('Auth.accueil');

Route::get('/user/home', function () {
    return view('user.home');
})->name('user.home');

Route::get('/logout', [LoginController::class, 'logout'] )->name('Logout');

// POST "/reserver/${anne}/${mois}/${jours}/${creneau}/${local}" 
