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

Route::get('/', function () {
    return view('adminDashboard.page.dashboard');
})->name('adminDashboard');

Route::get('/login', function () {
    return view('adminDashboard.page.login');
});

Route::get('/employee_List', [RegisteredUserController::class, 'index'])->name('employee_List');


Route::get('/marketing_Report', function () {
return view('adminDashboard.page.marketingReport');
})->name('marketing_Report');


Route::get('/user', function () {
return view('userDashboard.page.dashboard');
})->name('userDashboard');



// Route::get('/report_List', function () {
// return view('userDashboard\page\report_List');
// })->name('report_List');

// Route::get('/submit_Report', function () {
// return view('userDashboard\page\submit_Report');
// })->name('submit_Report');

Route::get('report_list', [SubmitController::class,'index'])->name('report_List');
Route::get('submit-report', [SubmitController::class,'create'])->name('submit_Report');
Route::post('submit-report', [SubmitController::class,'store'])->name('Report_submited');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
