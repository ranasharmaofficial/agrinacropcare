<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register user routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "user" middleware group. Now create something great!
|
*/

// Dashboard Modules Start
Route::get('auth/login', [DashboardController::class, 'login'])->name('dashboard.auth.login')->middleware('AlreadyDashLoggedIn');
Route::post('loginDash', [DashboardController::class, 'loginDash'])->name('loginDash')->middleware('AlreadyDashLoggedIn');

Route::get('home', [DashboardController::class, 'home'])->name('home');
Route::get('crop-care', [DashboardController::class, 'cropCare'])->name('crop-care');
Route::get('animal-health-care', [DashboardController::class, 'animalHealthCare'])->name('animal-health-care');
Route::get('insurance', [DashboardController::class, 'insurance'])->name('insurance');
// Route::group(['middleware'=>['DashboardAuthCheck']], function () {

// });
// Dashboard Modules End