<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\admin\MarketingReportController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AddressController;
use App\Http\Controllers\admin\appointmenController;

use App\Http\Controllers\EmployeeController;

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


Route::prefix('admin')->middleware(['auth', 'checkRole: 1'])->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('adminDashboard');
     Route::post('register', [RegisteredUserController::class, 'store']) -> name('registered');
     Route::get('/employee_List', [RegisteredUserController::class, 'employeeList'])->name('employee_List');
     Route::get('/employee_filter', [RegisteredUserController::class, 'employeeFilter'])->name('employee_filter');
     Route::get('/edit_employee/{id}', [RegisteredUserController::class, 'employeeEdit'])->name('employeeEdit');
     Route::patch('/update_employee/{id}', [RegisteredUserController::class,
     'employeeUpdate'])->name('employeeUpdated');
     Route::delete('/delete_employee/{id}', [RegisteredUserController::class, 'employeeDelete'])->name('delete_employee');
     
     Route::get('/marketing_Report', [MarketingReportController::class,
     'index'])->name('marketing_Report');
    // Api
    Route::get('report_details', [MarketingReportController::class,'reportDetails'])->name('report_details');
    //  Api

    Route::get('schedule_list', [SubmitController::class,'scheduleList'])->name('schedule_list');
    Route::get('schedule_list_api', [SubmitController::class,'scheduleList_api'])->name('schedule_list_api');

    

    Route::get('/create_district', [AddressController::class, 'districtCreate'])->name('createDistrict');
    Route::post('/store_district', [AddressController::class, 'districtStore'])->name('storeDistrict');

    Route::get('/create_upazila', [AddressController::class, 'upazilaCreate'])->name('createUpazila');
    Route::post('/store_upazila', [AddressController::class, 'upazilaStore'])->name('storeUpazila');

});



Route::prefix('employee')->middleware(['auth', 'checkRole: 2'])->group(function () {

    Route::get('/', [EmployeeController::class, 'index'])->name('userDashboard');
    Route::get('report_list', [SubmitController::class,'index'])->name('report_List');
    // Api
    Route::get('child_option', [SubmitController::class,'childOption'])->name('childOption_guardian');
    Route::get('autofill', [SubmitController::class,'autofill'])->name('autofill');
    // Api
    Route::get('submit-report', [SubmitController::class,'create'])->name('submit_Report');
    Route::post('submit-report', [SubmitController::class,'store'])->name('Report_submited');
    Route::get('view-report/{id}', [SubmitController::class,'view'])->name('view_Report');
    
    Route::get('schedule-report', [SubmitController::class,'scheduleCreate'])->name('schedule_Report');
    Route::post('schedule-report', [SubmitController::class,'scheduleStore'])->name('Submit_schedule');

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
