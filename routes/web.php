<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('landingPage');
});

// Registration routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');

// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login_proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// OTP verification routes
Route::get('/verify-otp', [AuthController::class, 'showVerifyOtpForm'])->name('auth.verifyOtp');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('auth.verifyOtp.post');



// task to do 
Route::middleware(['auth', 'adminMid'])->group(function () {
    Route::get('/todo', [TaskController::class, 'index'])->name('todo');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});
// admin
Route::get('/dashboard', [AdminController::class, 'index']);


