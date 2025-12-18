<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientSession;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientAppointment;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LabResultController;
use App\Http\Controllers\VitalSignController;
use App\Http\Controllers\AppointmentController;
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
    return view('home');
})->name('home');
Route::get('/location', function () {
    return view('location');
})->name('location');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('patients', function () {
    return view('admin/patients/indexpatient');
})->middleware(middleware: ['auth', 'verified'])->name('patients.index');

Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('admin/accounts', function () {
    return view('admin/accounts');
})->middleware(middleware: ['auth', 'verified'])->name('admin/accounts');

Route::get('admin/dialysis_sessions/', function () {
    return view('admin/dialysis_sessions');
})->middleware(middleware: ['auth', 'verified'])->name('admin/dialysis_sessions');

Route::get('patient/dashboard', function () {
    return view(view: 'patient/dashboard');
})->middleware(middleware: ['auth', 'verified'])->name('patient.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/users/create/{patient_id}', [UserController::class, 'createForPatient'])
    ->name('users.createForPatient');

Route::middleware('auth')->group(function () {
    Route::resource('/users', Usercontroller::class);
    Route::resource('/patients', PatientController::class);
    Route::resource('sessions', DialysisSessionController::class);
    Route::resource('vitals', VitalSignController::class);
    Route::resource('labs', LabResultController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/sessions/{session}/vitals', [DialysisSessionController::class, 'showVitals'])->name('sessions.vitals');
    Route::get('/sessions/{session}/vitals/create', [VitalSignController::class, 'create'])->name('vitals.create');
    Route::get('/labs/{session}/labs/create', [LabResultController::class, 'create'])->name('labs.create');
    Route::get('/labs/{session}/labs', [DialysisSessionController::class, 'showLabs'])->name('sessions.labs');
});
// In your routes/web.php
Route::get('sessions/{session}/print', [DialysisSessionController::class, 'print'])->name('sessions.print');
Route::patch('/appointments/{appointment}/complete', 
    [AppointmentController::class, 'markAsCompleted']
)->name('appointments.complete');
Route::patch('/appointments/{appointment}/cancel', 
    [AppointmentController::class, 'markAsCanceled']
)->name('appointments.cancel');


Route::middleware('auth')->group(function () {
    Route::resource('patient-session', PatientSession::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('patient-appointment', PatientAppointment::class);
});