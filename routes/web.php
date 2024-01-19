<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

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

Route::get('/Auth/home/gerer_annonces',function () {
    return view('Auth.gerer_annonces');
})->name('Auth.gerer_annonces');


Route::get('/user/home', function () {
    return view('user.home');
})->name('user.home');

Route::get('/logout', [LoginController::class, 'logout'] )->name('Logout');