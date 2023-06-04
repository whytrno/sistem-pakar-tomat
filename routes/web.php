<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index']);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [MainController::class, 'login'])->name('login');
    Route::post('/login', [MainController::class, 'loginProcess']);
    Route::get('/register', [MainController::class, 'register']);
    Route::post('/register', [MainController::class, 'registerProcess']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/gejala', [AdminController::class, 'gejala']);
    Route::get('/admin/keyakinan', [AdminController::class, 'keyakinan']);
    Route::get('/admin/hasil', [AdminController::class, 'hasil']);
    Route::get('/admin/user', [AdminController::class, 'user']);

    Route::get('/logout', [MainController::class, 'logout']);
    Route::get('/diagnosa', [MainController::class, 'diagnosa']);
    Route::get('/diagnosa/hasil', [MainController::class, 'hasil']);
});