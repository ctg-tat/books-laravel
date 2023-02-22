<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\AdminMiddleware;
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

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::middleware('auth')->get('/profile/add', function () {
    return view('add');
})->name('add');

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::middleware('auth')->get('/profile', 'user')->name('user');
    Route::middleware('auth')->get('/book/update/{book:id}', 'update')->name('update');
});

Route::middleware(AdminMiddleware::class)->get('/admin', [AdminController::class, 'show'])->name('admin');

Route::get('/admin/published/{book:id}', [BookController::class, 'setStatusPublished'])->name('published');
Route::get('/admin/blocked/{book:id}', [BookController::class, 'setStatusBlocked'])->name('blocked');

Route::get('/book/{id}', [BookController::class, 'show'])->name('book');
Route::middleware('auth')->get('/book/delete/{id}', [BookController::class, 'destroy'])->name('delete');
Route::middleware('auth')->post('/book/update/{book:id}', [BookController::class, 'update'])->name('book.update');
Route::middleware('auth')->post('/profile/add', [BookController::class, 'store'])->name('profile.add');

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');
});
