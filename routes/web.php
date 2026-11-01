<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;

// Redirect visitors to login first
Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('students', StudentController::class);
    Route::resource('departments', DepartmentController::class);
});

require __DIR__.'/auth.php';
