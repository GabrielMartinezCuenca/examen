<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookWriterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WriterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/login', [LoginController::class, 'login'])->name('login');



Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('custom')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware('checkAdmin')->group(function () {
        Route::resource('/editorials', EditorialController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/writers', WriterController::class);
        Route::resource('/books', BookController::class);
        Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
        Route::resource('/loans', LoanController::class);
        Route::get('/payments/{loan}', [PaymentController::class, 'create'])->name('payments.create');
        Route::post('/payments/store/{loan}', [PaymentController::class, 'store'])->name('payments.store');
        Route::post('/book-writer/store', [BookWriterController::class, 'store'])->name('book_writer.store');
    });
});
