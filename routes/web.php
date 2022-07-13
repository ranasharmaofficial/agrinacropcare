<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExternalController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/', [ExternalController::class,'index'])->name('/');
Route::view('about', 'about');
Route::get('course', [ExternalController::class, 'course'])->name('course');
Route::get('course-details/{courseslug}', [ExternalController::class, 'courseSingle'])->name('course-details');
Route::view('events', 'events');
Route::view('gallery', 'gallery');
Route::view('contact', 'contact');
Route::view('register', 'register');
Route::view('verification', 'verification');
Route::view('login', 'login');
Route::view('blog', 'blog');
Route::view('teacher', 'teacher');
Route::get('privacy-policy',[ExternalController::class,'privacyPolicy'])->name('privacy-policy');
Route::get('terms-conditions',[ExternalController::class,'termsCondition'])->name('terms-conditions');
Route::get('about-us',[ExternalController::class,'aboutUs'])->name('about-us');
Route::get('register', [ExternalController::class, 'register'])->name('register');
Route::get('thankyou', [ExternalController::class, 'thankyou'])->name('thankyou');
Route::get('login', [ExternalController::class, 'login'])->name('login');
Route::get('gallery',[ExternalController::class,'gallery'])->name('gallery');
Route::get('events',[ExternalController::class, 'events'])->name('events');
Route::post('getBlockNames',[ExternalController::class, 'getBlockNames'])->name('getBlockNames');
Route::post('enquiryContact', [ExternalController::class,'enquiryContact'])->name('enquiryContact');
Route::get('mediupload',[MediaController::class, 'uploadMedia'])->name('mediupload');
Route::post('mediupload',[MediaController::class, 'uploadMedia'])->name('mediupload');

//Student Modules Start
Route::post('studentRegister', [StudentController::class, 'studentRegister'])->name('studentRegister');
Route::post('getotp', [StudentController::class, 'studentGetOTP'])->name('getotp');
Route::post('studentLogin', [StudentController::class, 'studentLogin'])->name('studentLogin');
Route::get('teacher/logout', [StudentController::class, 'studentLogout'])->name('teacher/logout');
Route::group(['middleware'=>['StudentAuthCheck']], function(){
    Route::get('teacher/home', [StudentController::class, 'studentHome'])->name('teacher.home');
    Route::get('teacher/uploaddata', [StudentController::class, 'uploadData'])->name('teacher.uploaddata');
    Route::get('teacher/view-profile', [StudentController::class, 'viewProfile'])->name('teacher.view-profile');
    Route::get('teacher/update-profile', [StudentController::class, 'updateProfile'])->name('teacher.update-profile');
    Route::get('teacher/change-password', [StudentController::class, 'changePassword'])->name('teacher.change-password');
    Route::post('teacher/change-password', [StudentController::class, 'changeOldPassword'])->name('teacher.change-password');
    Route::post('teacher/uploadData', [StudentController::class, 'uploadDataDetails'])->name('teacher.uploadData');
    Route::get('teacher/data-list', [StudentController::class, 'teacherDataList'])->name('teacher.data-list');
    Route::post('workPayment', [StudentController::class, 'updateWorkPayment'])->name('workPayment');
});
//Student Modules End


// Employee Modules Start
Route::get('employee/login',[EmployeeController::class,'login'])->name('employee.login')->middleware('AlreadyLoggedEmployee');
Route::post('employee/login',[EmployeeController::class,'EmployeeAuthLogin'])->name('employee.login')->middleware('AlreadyLoggedEmployee');

Route::group(['middleware'=>['EmployeeAuthCheck']], function(){
    Route::get('employee/home', [EmployeeController::class, 'employeeHome'])->name('employee.home');
    Route::get('employee/logout', [EmployeeController::class, 'employeeLogout'])->name('employee/logout');
    Route::get('employee/ongoing-project', [EmployeeController::class, 'onGoingProject'])->name('employee/ongoing-project');
    Route::get('employee/completed-project', [EmployeeController::class, 'completedProject'])->name('employee/completed-project');
    Route::get('employee/wallet-history', [EmployeeController::class, 'walletHistory'])->name('employee/wallet-history');
    Route::post('employee/view-project-details', [EmployeeController::class, 'viewProjectDetailsOn'])->name('employee/view-project-details');
    Route::get('employee/my-wallet', [EmployeeController::class, 'myWallet'])->name('employee/my-wallet');
    Route::get('employee/work-details/{workid}', [EmployeeController::class, 'worksDetails'])->name('employee.work-details/{workid}');
    Route::post('markAsCompleted', [EmployeeController::class, 'markAsWorkCompleted'])->name('markAsCompleted');
});
// Employee Modules End

// Admin Modules Start
Route::get('admin/auth/login', [AdminController::class, 'login'])->name('admin.auth.login')->middleware('AlreadyLoggedIn');
Route::post('adminAuthLogin', [AdminController::class, 'adminAuthLogin'])->name('adminAuthLogin')->middleware('AlreadyLoggedIn');

Route::group(['middleware'=>['AdminAuthCheck']], function () {
    
    // Route::get('distributor/home', [DistributorController::class, 'distributorHome'])->name('distributor.home');
    // Route::get('distributor/project-request',[DistributorController::class,'projectRequest'])->name('distributor.project-request');
    // Route::get('distributor/user-list',[DistributorController::class,'userList'])->name('distributor.user-list');
    // Route::get('distributor/create-project',[DistributorController::class,'createProject'])->name('distributor.create-project');
    // Route::get('distributor/project-list',[DistributorController::class,'projectList'])->name('distributor.project-list');
    // Route::get('distributor/view-project',[DistributorController::class,'viewProject'])->name('distributor.view-project');

    Route::get('admin/home', [AdminController::class, 'adminHome'])->name('admin.home');
    Route::get('admin/add-student', [AdminController::class, 'addStudent'])->name('admin.add-student');
    Route::get('admin/view-student', [AdminController::class, 'viewStudent'])->name('admin.view-student');
    Route::get('admin/update-student', [AdminController::class, 'updateStudent'])->name('admin.update-student');
    Route::get('admin/remove-student', [AdminController::class, 'removeStudent'])->name('admin.remove-student');
    Route::get('admin/student-list', [AdminController::class, 'studentList'])->name('admin.student-list');
    Route::get('admin/teacher-list', [AdminController::class, 'teacherList'])->name('admin.teacher-list');
    Route::get('admin/data-list', [AdminController::class, 'dataList'])->name('admin.data-list');
    Route::get('admin/work-completed-request', [AdminController::class, 'workCompletedRequest'])->name('admin.work-completed-request');
    Route::post('makePaymentToWallet', [AdminController::class, 'makePaymentToWallet'])->name('makePaymentToWallet');
    Route::post('updateAmount', [AdminController::class, 'updateAmount'])->name('updateAmount');
    Route::post('assignWork', [AdminController::class, 'assignWorkEmployee'])->name('assignWork');
    Route::get('admin/work-details/{workid}', [AdminController::class, 'workDetails'])->name('admin.work-details/{workid}');
    Route::get('admin/teacher-details/{teacherid}', [AdminController::class, 'teacherDetails'])->name('admin.teacher-details/{teacherid}');
    Route::get('admin/teacher-list-search', [AdminController::class, 'teacherListSearch'])->name('admin.teacher-list-search');
    Route::post('getBlocks', [AdminController::class, 'getBlocks'])->name('getBlocks');
    Route::get('admin/teacher-list-search-details', [AdminController::class, 'teacherListSearchDetails'])->name('admin.teacher-list-search-details');

    Route::get('admin/add-distributor', [AdminController::class, 'addDistributor'])->name('admin.add-distributor');
    Route::get('admin/view-distributor', [AdminController::class, 'viewDistributor'])->name('admin.view-distributor');
    Route::post('admin/view-distributor', [AdminController::class, 'viewDistributor'])->name('admin.view-distributor');
    Route::get('admin/update-distributor/{distributorid}', [AdminController::class, 'updateDistributor'])->name('admin.update-distributor.{distributorid}');
    Route::get('admin/distributor-list', [AdminController::class, 'distributorList'])->name('admin.distributor-list');
    Route::post('uploadDistributorData',[AdminController::class, 'uploadDistributorData'])->name('uploadDistributorData');
    Route::post('updateDistributorData', [AdminController::class, 'updateDistributorData'])->name('updateDistributorData');
    Route::post('admin/removeDistributor', [AdminController::class, 'removeDistributor'])->name('admin.removeDistributor');
    Route::post('admin/unBlockDistributor', [AdminController::class, 'unBlockDistributor'])->name('admin.unBlockDistributor');
    
    Route::get('admin/user-list', [AdminController::class, 'userList'])->name('admin.user-list');
    Route::post('blockUserContract', [AdminController::class, 'blockUserContract'])->name('blockUserContract');
    Route::post('unBlockUserContract', [AdminController::class, 'unBlockUserContract'])->name('unBlockUserContract');
    Route::post('getuserdetails', [AdminController::class, 'getuserdetails'])->name('getuserdetails');
    Route::post('disApproveContractor', [AdminController::class, 'disApproveContractor'])->name('disApproveContractor');
    Route::post('approveContractor', [AdminController::class, 'approveContractor'])->name('approveContractor');
    
    Route::get('admin/create-project', [AdminController::class, 'createProject'])->name('admin.create-project');
    Route::get('admin/create-project-category', [AdminController::class, 'createProjectCategory'])->name('admin.create-project-category');
    Route::get('admin/project-list', [AdminController::class, 'projectList'])->name('admin.project-list');
    Route::get('admin/project-category-list', [AdminController::class, 'projectCategoryList'])->name('admin.project-category-list');
    Route::post('uploadProjectCategory', [AdminController::class, 'uploadProjectCategory'])->name('uploadProjectCategory');
    Route::post('uploadProjectData', [AdminController::class, 'uploadProjectData'])->name('uploadProjectData');
    Route::post('getamountofproject', [AdminController::class, 'getamountofproject'])->name('getamountofproject');
    Route::post('getProjectName', [AdminController::class, 'getProjectName'])->name('getProjectName');

    Route::get('admin/add-employee', [AdminController::class, 'addEmployee'])->name('admin.add-employee');
    Route::get('admin/view-employee', [AdminController::class, 'viewEmployee'])->name('admin.view-employee');
    Route::post('admin/view-employee', [AdminController::class, 'viewEmployee'])->name('admin.view-employee');
    Route::get('admin/update-employee/{employeeid}', [AdminController::class, 'updateEmployee'])->name('admin.update-employee.{employeeid}');
    Route::get('admin/employee-list', [AdminController::class, 'employeeList'])->name('admin.employee-list');
    Route::post('addEmployee', [AdminController::class, 'addEmployeeData'])->name('addEmployee');
    Route::post('updateEmployee', [AdminController::class, 'updateEmployeeData'])->name('updateEmployee');

    Route::get('admin/create-company',[AdminController::class,'createCompany'])->name('admin.create-company');
    Route::get('admin/company-list',[AdminController::class,'companyList'])->name('admin.company-list');
    Route::get('admin/view-company',[AdminController::class,'viewCompany'])->name('admin.view-company');
    Route::post('admin/viewcompany',[AdminController::class,'viewCompany'])->name('admin.viewcompany');
    Route::get('admin/update-company/{companyid}',[AdminController::class,'updateCompany'])->name('admin.update-company.{companyid}');
    Route::post('admin/create-company', [AdminController::class,'createHtrustCompany'])->name('admin.create-company');
    Route::post('admin/update-company', [AdminController::class,'updateHtrustCompany'])->name('admin.update-company');

    Route::get('admin/add-course', [AdminController::class, 'addCourse'])->name('admin.add-course');
    Route::get('admin/course-list', [AdminController::class, 'courseList'])->name('admin.course-list');

    Route::get('admin/add-event', [AdminController::class, 'addEvent'])->name('admin.add-event');
    Route::get('admin/event-list', [AdminController::class, 'eventList'])->name('admin.event-list');
    Route::post('deleteEvent', [AdminController::class, 'deleteEvent'])->name('deleteEvent');

    Route::get('admin/add-gallery', [AdminController::class, 'addGallery'])->name('admin.add-gallery');
    Route::get('admin/gallery-list', [AdminController::class, 'galleryList'])->name('admin.gallery-list');
    Route::post('deleteGalleryImage', [AdminController::class, 'deleteGalleryImage'])->name('deleteGalleryImage');

    Route::get('admin/add-notice', [AdminController::class, 'addNotice'])->name('admin.add-notice');
    Route::get('admin/notice-list', [AdminController::class, 'noticeList'])->name('admin.notice-list');

    Route::get('admin/enquiry-list', [AdminController::class, 'enquiryList'])->name('admin.enquiry-list');
    Route::get('admin/emailsubscription-list', [AdminController::class, 'emailsubscriptionList'])->name('admin.emailsubscription-list');

    Route::get('admin/reset-password', [AdminController::class, 'resetPassword'])->name('admin.reset-password');

    Route::get('admin/add-slider', [AdminController::class, 'addSlider'])->name('admin.add-slider');
    Route::get('admin/slider-list', [AdminController::class, 'sliderList'])->name('admin.slider-list');
    Route::get('admin/update-logo', [AdminController::class, 'updateLogo'])->name('admin.update-logo');
    Route::get('admin/contact-details', [AdminController::class, 'updateContactDetails'])->name('admin.contact-details');
    Route::get('admin/social-media', [AdminController::class, 'socialMediaLinks'])->name('admin.social-media');
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::post('uploadHeaderLogo', [AdminController::class, 'uploadHeaderLogo'])->name('uploadHeaderLogo');
    Route::post('uploadFooterLogo', [AdminController::class, 'uploadFooterLogo'])->name('uploadFooterLogo');
    Route::post('uploadFaviconLogo', [AdminController::class, 'uploadFaviconLogo'])->name('uploadFaviconLogo');
    Route::post('uploadContactDetails', [AdminController::class, 'uploadContactDetails'])->name('uploadContactDetails');
    Route::post('updateContactDetailsU', [AdminController::class, 'updateContactDetailsU'])->name('updateContactDetailsU');
    Route::post('uploadCourseDetails', [AdminController::class, 'uploadCourseDetails'])->name('uploadCourseDetails');
    Route::post('getcoursedetails', [AdminController::class, 'getcoursedetails'])->name('getcoursedetails');
    Route::post('uploadsociallinks', [AdminController::class, 'uploadSocialLinks'])->name('uploadsociallinks');
    Route::post('updateSocialLinks', [AdminController::class, 'updateSocialLinks'])->name('updateSocialLinks');
    Route::post('uploadSlider', [AdminController::class, 'uploadSlider'])->name('uploadSlider');
    Route::post('updateSlider', [AdminController::class, 'updateSlider'])->name('updateSlider');
    Route::post('uploadEvent', [AdminController::class, 'uploadEvent'])->name('uploadEvent');
    Route::post('uploadGalleryImage', [AdminController::class, 'uploadGalleryImage'])->name('uploadGalleryImage');
    Route::post('uploadNotice', [AdminController::class, 'uploadNotice'])->name('uploadNotice');
});
// Admin Modules End