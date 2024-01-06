<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

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


Route::middleware(['auth', 'checkRole: 1'])->group(function () {

    Route::get('/admin', [RegisteredUserController::class, 'index'])->name('adminDashboard');
     Route::post('register', [RegisteredUserController::class, 'store']) -> name('registered');
     Route::get('/employee_List', [RegisteredUserController::class, 'employeeList'])->name('employee_List');
     Route::get('/marketing_Report', function () {
     return view('adminDashboard.page.marketingReport');
     })->name('marketing_Report');

});



Route::prefix('employee')->middleware(['auth', 'checkRole: 2'])->group(function () {

    Route::get('/', function () {
    return view('userDashboard.page.dashboard');
    })->name('userDashboard');
    Route::get('report_list', [SubmitController::class,'index'])->name('report_List');
    Route::get('submit-report', [SubmitController::class,'create'])->name('submit_Report');
    Route::post('submit-report', [SubmitController::class,'store'])->name('Report_submited');

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
