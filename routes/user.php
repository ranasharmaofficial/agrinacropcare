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
Route::get('auth/agriculture-registration', [DashboardController::class, 'AgriRegistration'])->name('dashboard.auth.agriculture-registration');
Route::post('uploadAgriRetailerRegData', [DashboardController::class, 'uploadAgriRetailerRegData'])->name('dashboard.uploadAgriRetailerRegData');
Route::post('uploadDocRegData', [DashboardController::class, 'uploadDocRegData'])->name('dashboard.uploadDocRegData');
Route::post('uploadFarmerRegData', [DashboardController::class, 'uploadFarmerRegData'])->name('dashboard.uploadFarmerRegData');
Route::post('getPinCodeDetails', [DashboardController::class, 'getPinCodeDetails'])->name('dashboard.getPinCodeDetails');
Route::get('kisan-loan',[DashboardController::class,'kisanLoan'])->name('kisan-loan');
Route::post('applyForKisanLoan',[DashboardController::class,'applyForKisanLoan'])->name('dashboard.applyForKisanLoan');
Route::get('agriculture-shop', [DashboardController::class, 'agricultureShop'])->name('dashboard.agricultureShop');
Route::get('agriculture-shop-details', [DashboardController::class, 'agriShopSearch'])->name('dashboard.agriShopSearch');
Route::get('cattledoctor-search-details', [DashboardController::class, 'cattleDoctorSearch'])->name('dashboard.cattleDoctorSearch');
Route::get('cattle-doctor', [DashboardController::class, 'cattleDoctors'])->name('dashboard.cattleDoctors');
Route::get('support',[DashboardController::class,'support'])->name('support');
Route::group(['middleware'=>['DashboardAuthCheck']], function () {
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    //crop insurace
    Route::get('crop-insurance', [DashboardController::class, 'cropInsurance'])->name('crop-insurance');
    Route::post('uploadCropInsuranceData', [DashboardController::class, 'uploadCropInsuranceData'])->name('dashboard.uploadCropInsuranceData');
    Route::get('crop-insurance-preview/{tokenno}', [DashboardController::class, 'cropInsuranceDetailsPreview'])->name('dashboard.crop-insurance-preview.{tokenno}');
    Route::get('crop-insurance-done/{tokenno}', [DashboardController::class, 'cropInsuranceDone'])->name('dashboard.crop-insurance-done.{tokenno}');
    //cattle insurance
    
    Route::get('cattle-insurance', [DashboardController::class, 'cattleInsurance'])->name('cattle-insurance');
    Route::post('uploadCattleInsuranceData', [DashboardController::class, 'uploadCattleInsuranceData'])->name('dashboard.uploadCattleInsuranceData');
    Route::get('cattle-insurance-preview/{tokenno}', [DashboardController::class, 'cattleInsuranceDetailsPreview'])->name('dashboard.cattle-insurance-preview.{tokenno}');
    Route::get('cattle-insurance-done/{tokenno}', [DashboardController::class, 'cattleInsuranceDone'])->name('dashboard.cattle-insurance-done.{tokenno}');
    
});
Route::post('getInsuranceDone', [DashboardController::class, 'getInsuranceDone'])->name('dashboard.getInsuranceDone');
// Dashboard Modules End