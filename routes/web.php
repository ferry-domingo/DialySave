<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LabResultController;
use App\Http\Controllers\VitalSignController;
use App\Http\Controllers\SessionStaffController;
use App\Http\Controllers\DialysisSessionController;

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
    return view('welcome');
});

Route::get('admin/dashboard', function () {
    return view('admin/dashboard');
})->middleware(middleware: ['auth', 'verified'])->name('admin/dashboard');

Route::get('admin/accounts',function(){
    return view('admin/accounts');
})->middleware(middleware: ['auth','verified'])->name('admin/accounts');

Route::get('admin/dialysis_sessions/',function(){
    return view('admin/dialysis_sessions');
})->middleware(middleware: ['auth','verified'])->name('admin/dialysis_sessions');

/*Route::middleware(['role:admin'])->group(function () {
    Route::resource('users', UserController::class);
}); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('/users',Usercontroller::class);
Route::resource('/patients',PatientController::class);
Route::resource('sessions', DialysisSessionController::class);
Route::resource('vitals', VitalSignController::class);
Route::resource('labs', LabResultController::class);
Route::resource('session-staff', SessionStaffController::class);
Route::get('/sessions/{session}/vitals', [DialysisSessionController::class, 'showVitals'])->name('sessions.vitals');
Route::get('/sessions/{session}/vitals/create', [VitalSignController::class, 'create'])->name('vitals.create');
Route::get('/labs/{session}/labs/create', [LabResultController::class, 'create'])->name('labs.create');
Route::get('/labs/{session}/labs', [DialysisSessionController::class, 'showLabs'])->name('sessions.labs');