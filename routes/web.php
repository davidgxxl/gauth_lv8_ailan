<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Inicio
Route::view('/', 'inicio.inicio')->name('inicio');

// Usuario de google
Route::get('/sesion/usuario-google', function () {
    return Socialite::driver('google')->redirect();
})->name('usuario-google');
Route::get('/callback', [SesionController::class, 'usuarioGoogle']);

// Ingreso
Route::view('/sesion/codigo-verificacion', 'sesion.codigo-verificacion')->name('codigo-verificacion');
Route::post('/sesion/codigo-verificacion', [SesionController::class, 'ingreso']);

// Salir
Route::get('/sesion/salir', function (){
    Auth::logout();
    return redirect()->route('inicio');
})->name('salir');