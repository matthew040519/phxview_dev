<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;

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
    return view('login');
})->name('login');

Route::post('/login-user', [LoginController::class, 'login'])->name('login-user');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'auth.session'])->group(function () {

    Route::middleware(['restrictRole:1'])->group(function() {
        Route::get('/dashboard',[DashboardController::class, 'index']);
        Route::get('/client',[ClientController::class, 'index']);
    });

});
