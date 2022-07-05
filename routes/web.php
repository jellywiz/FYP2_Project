<?php

use App\Http\Controllers\{
    AttendanceController,
    JobController,
    DepartmentController,
    UserController,
    AuthController
};



use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
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

// Route::redirect('/', '/login');
Route::get('/register', Register::class)->name('register');
// Route::get('/login', Login::class)->name('login');
Route::get('/login', [AuthController::class, "index"])->name('login');
Route::get('/getRandomEmp', [AuthController::class, "getRandomEmp"]);
Route::post('/login', [AuthController::class, "login"])->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->group(function () {

    Route::view('/profile', 'profile')->name('profile');
    Route::get('/user-attendance/{user}', [AttendanceController::class, "userAttendance"])->name('attendances.user-attendance');
    Route::post('/attendance-complain/{attendance}', [AttendanceController::class, "attendanceComplain"])->name('attendances.attendanceComplain');

    // Admin Routes 
    Route::middleware('is_admin')->group(function () {
        Route::get('/', Dashboard::class)->name('dashboard');
        Route::resource("departments", DepartmentController::class)->except("show");
        Route::resource("jobs", JobController::class)->except("show");
        Route::resource("users", UserController::class);
        Route::get('/attendances', [AttendanceController::class, "index"])->name('attendances.index');
        Route::get('/take-attendance', [AttendanceController::class, "takeAttendance"])->name('attendances.take-attendance');

        //complian
        Route::get('/view-complain/{id}', [AttendanceController::class, "viewComplain"])->name('attendances.view-complain');
        Route::post('/fix-complain/{id}', [AttendanceController::class, "fixComplain"])->name('attendances.fix-complain');
    });
});
