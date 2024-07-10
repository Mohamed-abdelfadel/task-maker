<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/' , [DashboardController::class,'dashboard'])->name('dashboard');
Route::get('/soon' , [authController::class,'comingSoon'])->name('soon');
Route::get('/login' , [authController::class,'login'])->name('login');
Route::get('/register' , [authController::class,'register'])->name('register');

//Route::group(['middleware' => ['auth']], function () {
Route::get('/tasks' , [TaskController::class,'index'])->name('tasks.index');
Route::get('/tasks/create' , [TaskController::class,'create'])->name('tasks.create');
Route::post('/tasks' , [TaskController::class,'store'])->name('tasks.store');
Route::delete('/tasks/destroy/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
Route::get('/tasks/done/{id}', [TaskController::class, 'done'])->name('task.done');

Route::get('/users' , [UserController::class,'index'])->name('users.index');
Route::get('/users/create' , [UserController::class,'create'])->name('users.create');
Route::DELETE('/users/destroy/{id}' , [UserController::class,'destroy'])->name('user.destroy');
//});
