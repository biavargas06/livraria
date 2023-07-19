<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LivroController;
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

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'regSuccess'])->name('register.addSuccess');

Route::get('/new-book', [LivroController::class, 'book'])->name('book')->middleware('auth');
Route::post('/new-book', [LivroController::class, 'newBook'])->name('book.newBook');

Route::get('/new-book/genre', [LivroController::class, 'genre'])->name('genre')->middleware('auth');
Route::post('/new-book/genre', [LivroController::class, 'newGenre'])->name('genre.newGenre');

Route::get('/new-book/genre/new', [LivroController::class, 'index'])->name('genre.view')->middleware('auth');
Route::post('/new-book/genre/new', [LivroController::class, 'index'])->name('genre.viewTable');

