<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PaginationController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/feeds/create', [ImageController::class, 'create'])->name('feeds.create');
Route::post('/feeds', [ImageController::class, 'store'])->name('feeds.store');
Route::get('/feeds/{image}', [ImageController::class, 'show'])->name('feeds.show');
Route::get('/feeds', [ImageController::class, 'index'])->name('feeds.index');
Route::delete('/feeds/{image}', [ImageController::class, 'destroy'])->name('feeds.destroy');

Route::get('/pagination', [PaginationController::class, 'index']);