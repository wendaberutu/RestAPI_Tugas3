<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('landingPage');
});

// login 
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('login_proses');
Route::get('/logout',[AuthController::class,'logout']) -> name('logout');

// task to do 
Route::middleware(['auth', 'adminMid'])->group(function () {
    Route::get('/todo', [TaskController::class, 'index'])->name('todo');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});
// admin
Route::get('/dashboard', [AdminController::class, 'index']);


