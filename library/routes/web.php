<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::get('/login', [UsuarioController::class, 'login'])->name('login');
Route::post('/login', [UsuarioController::class, 'login']);

Route::get('/register', [UsuarioController::class, 'register'])->name('register');
Route::post('/register', [UsuarioController::class, 'regSuccess'])->name('register.addSuccess');

