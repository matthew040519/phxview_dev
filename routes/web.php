<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CitiesmunicipalitiesController;

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
Route::get('/register', [LoginController::class, 'register']);
Route::get('/city', [CitiesmunicipalitiesController::class, 'city']);
Route::post('/addmember', [LoginController::class, 'addmember'])->name('addmember');
Route::get('/brgy',[DashboardController::class, 'province']);

Route::middleware(['auth', 'auth.session'])->group(function () {

    Route::middleware(['restrictRole:1'])->group(function() {
        Route::get('/dashboard',[DashboardController::class, 'index']);
        
        Route::get('/client',[ClientController::class, 'index']);
        Route::post('/add-client',[ClientController::class, 'addclient'])->name('addclient');
        Route::get('/task',[TaskController::class, 'index']);
        Route::post('/add-task',[TaskController::class, 'addtask'])->name('addtask');
        Route::get('/package',[PackageController::class, 'index']);
        Route::post('/add-package',[PackageController::class, 'addpackage'])->name('addpackage');
    });

});
