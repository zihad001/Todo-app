<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/akash', [App\Http\Controllers\TodoController::class, 'index'])->name('zihad');

Route::post('/add', [App\Http\Controllers\TodoController::class, 'add'])->name('addTodo');

Route::delete('/delete/{id}', [App\Http\Controllers\TodoController::class, 'destroy'])->name('deleteTodo');

Route::put('/update/{id}', [App\Http\Controllers\TodoController::class, 'update'])->name('updateTodo');

