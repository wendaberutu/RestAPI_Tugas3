<?php

use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route:: get('/todos', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'store']);     // Menambahkan todo baru
Route::get('/todos/{id}', [TodoController::class, 'show']);  // Menampilkan todo berdasarkan ID
Route::put('/todos/{id}', [TodoController::class, 'update']); // Memperbarui todo berdasarkan ID
Route::delete('/todos/{id}', [TodoController::class, 'destroy']); // Menghapus todo berdasarkan ID