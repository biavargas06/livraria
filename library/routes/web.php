<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LivroController;
use App\Models\Genero;
use App\Models\Livro;
use App\Models\LivroGen;
use Illuminate\Http\Request;
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

Route::get('/', function (Request $request) {
    if ($request->isMethod('POST')) {
        $busca = $request->busca;

        $books = Livro::where('nome', 'LIKE', "%{$busca}%")
            ->orderBy('id')
            ->get();
    } else {
        $livrogen = LivroGen::all();

    }
    return view('welcome')->with(['LivroGen' => $livrogen]);

})->name('home');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'regSuccess'])->name('register.addSuccess');

Route::get('/new-book', [LivroController::class, 'book'])->name('book')->middleware('auth');
Route::post('/new-book', [LivroController::class, 'newBook'])->name('book.newBook');

Route::get('/new-book/book/view', [LivroController::class, 'searchBook'])->name('book.view')->middleware('auth');
Route::post('/new-book/book/view', [LivroController::class, 'searchBook'])->name('book.viewTable');

Route::get('/new-book/book/edit/{books}', [LivroController::class, 'editBook'])->name('book.edit')->middleware('auth');
Route::post('/new-book/book/edit/{books}', [LivroController::class, 'editSaveBook'])->name('book.editSave');

Route::get('/new-book/book/delete/{books}', [LivroController::class, 'deleteBook'])->name('book.delete')->middleware('auth');
Route::delete('/new-book/book/delete/{books}', [LivroController::class, 'deleteConfirmBook'])->name('book.deleteConfirm');

Route::get('/new-book/genre', [LivroController::class, 'genre'])->name('genre')->middleware('auth');
Route::post('/new-book/genre', [LivroController::class, 'newGenre'])->name('genre.newGenre');

Route::get('/new-book/genre/new', [LivroController::class, 'search'])->name('genre.view')->middleware('auth');
Route::post('/new-book/genre/new', [LivroController::class, 'search'])->name('genre.viewTable');

Route::get('/new-book/genre/edit/{genero}', [LivroController::class, 'edit'])->name('genre.edit')->middleware('auth');
Route::post('/new-book/genre/edit/{genero}', [LivroController::class, 'editSave'])->name('genre.editSave');

Route::get('/new-book/genre/delete/{genero}', [LivroController::class, 'delete'])->name('genre.delete')->middleware('auth');
Route::delete('/new-book/genre/delete/{genero}', [LivroController::class, 'deleteConfirm'])->name('genre.deleteConfirm');
