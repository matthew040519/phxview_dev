<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CitiesmunicipalitiesController;
use App\Http\Controllers\ConversionController;
use App\Http\Controllers\WithdrawController;
use App\Http\Controllers\TreeController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Str;

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

    $code = Str::random(5);
    return view('login')->with('code', $code);
})->name('login');

Route::post('/login-user', [LoginController::class, 'login'])->name('login-user');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register']);
Route::get('/city', [CitiesmunicipalitiesController::class, 'city']);
Route::post('/addmember', [LoginController::class, 'addmember'])->name('addmember');
Route::get('/brgy',[DashboardController::class, 'province']);

Route::middleware(['auth', 'auth.session'])->group(function () {

    Route::middleware(['restrictRole:1'])->group(function() {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard',[DashboardController::class, 'index']);
            Route::get('/client',[ClientController::class, 'index']);
            Route::post('/add-client',[ClientController::class, 'addclient'])->name('addclient');
            Route::get('/task',[TaskController::class, 'index']);
            Route::post('/add-task',[TaskController::class, 'addtask'])->name('addtask');
            Route::get('/package',[PackageController::class, 'index']);
            Route::post('/add-package',[PackageController::class, 'addpackage'])->name('addpackage');
        });
    });

    Route::middleware(['restrictRole:0'])->group(function() {
        Route::prefix('member')->group(function () {
            Route::get('/memberdashboard',[DashboardController::class, 'memberdashboard']);
            Route::get('/withdraw',[WithdrawController::class, 'index']);
            Route::get('/getTask',[DashboardController::class, 'getTaskData']);
            Route::get('/insertTask',[DashboardController::class, 'insertMemberTask']);
            Route::get('/memberIncome',[DashboardController::class, 'memberIncome']);
            Route::get('/rewardsWallet',[DashboardController::class, 'RewardsWallet']);
            Route::get('/getPHXToken',[DashboardController::class, 'Token']);
            Route::get('/packages',[PackageController::class, 'package']);
            Route::post('/conversion',[ConversionController::class, 'conversion'])->name('conversion');
            Route::post('/addwithdrawal',[WithdrawController::class, 'addwithdrawal'])->name('addwithdrawal');
            Route::post('/conversion-phxtoken',[ConversionController::class, 'convertToAznt'])->name('conversion_phxtoken');
            Route::get('/addpackage',[PackageController::class, 'memberpackage']);
            Route::get('/genealogy',[TreeController::class, 'genealogy']);
            Route::get('/market',[MarketController::class, 'market']);
            Route::get('/products',[MarketController::class, 'products']);
            Route::get('/profile',[ProfileController::class, 'profile']);
            Route::get('/convert-report',[ReportController::class, 'convert']);
            Route::get('/claim-report',[ReportController::class, 'claimreport']);
            Route::get('/unilevel',[ReportController::class, 'unilevel']);
            Route::get('/games',[DashboardController::class, 'games']);
            Route::post('/ds-to-dc',[DashboardController::class, 'ds_to_dc'])->name('ds_to_dc');
            Route::post('/unilevel-to-dc',[DashboardController::class, 'unilevel_to_dc'])->name('unilevel_to_dc');
            Route::get('/direct-sponsor-report',[ReportController::class, 'directSponsor']);
            Route::get('/p2p-transaction',[MemberController::class, 'p2ptransaction']);
            Route::post('/update-password',[ProfileController::class, 'updatepassword'])->name('updatepassword');
            Route::post('/update-acc',[ProfileController::class, 'updateacc'])->name('updateacc');
            Route::post('/update-info',[ProfileController::class, 'updateinfo'])->name('updateinfo');
            Route::post('/transfer-funds',[MemberController::class, 'transfer'])->name('transferfunds');
        });
    });

});
