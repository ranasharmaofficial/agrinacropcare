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

Route::get('logout', [DashboardController::class, 'dashLogout'])->name('logout');
Route::get('home', [DashboardController::class, 'index'])->name('home');
Route::get('crop-care', [DashboardController::class, 'cropCare'])->name('crop-care');
Route::get('animal-health-care', [DashboardController::class, 'animalHealthCare'])->name('animal-health-care');
Route::get('insurance', [DashboardController::class, 'insurance'])->name('insurance');
Route::get('register', [DashboardController::class, 'selectRegister'])->name('register');
Route::get('auth/farmer-registration', [DashboardController::class, 'farmerReg'])->name('dashboard.auth.farmer-registration');
Route::get('auth/doctor-registration', [DashboardController::class, 'doctorRegistration'])->name('dashboard.auth.doctor-registration');
Route::post('uploadDocRegData', [DashboardController::class, 'uploadDocRegData'])->name('dashboard.uploadDocRegData');
Route::post('uploadFarmerRegData', [DashboardController::class, 'uploadFarmerRegData'])->name('dashboard.uploadFarmerRegData');
Route::post('getPinCodeDetails', [DashboardController::class, 'getPinCodeDetails'])->name('dashboard.getPinCodeDetails');
Route::group(['middleware'=>['DashboardAuthCheck']], function () {
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('crop-insurance', [DashboardController::class, 'cropInsurance'])->name('crop-insurance');
    
});
// Dashboard Modules End