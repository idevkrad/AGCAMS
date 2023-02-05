<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return inertia('Welcome');});

Route::middleware(['auth'])->group(function () {
    Route::resource('/home', App\Http\Controllers\HomeController::class);
    Route::resource('appointments', App\Http\Controllers\AppointmentController::class);
    Route::resource('staffs', App\Http\Controllers\StaffController::class);
    Route::resource('students', App\Http\Controllers\StudentController::class);
    Route::resource('appointments', App\Http\Controllers\AppointmentController::class);
});

require __DIR__.'/auth.php';