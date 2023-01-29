<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return inertia('Welcome');});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {  return inertia('Home/Index'); });
    Route::resource('staffs', App\Http\Controllers\StaffController::class);
    Route::resource('students', App\Http\Controllers\StudentController::class);
});

require __DIR__.'/auth.php';