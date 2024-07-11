<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/soon', [authController::class, 'comingSoon'])->name('soon');
Route::get('/login', [authController::class, 'login'])->name('login');
Route::get('/register', [authController::class, 'register'])->name('register');

//Route::group(['middleware' => ['auth']], function () {

// Task routes
Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/destroy/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
    Route::get('/done/{id}', [TaskController::class, 'done'])->name('task.done');
});

// User routes
Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

//});
