<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('layout.home');
});
Route::get('/' , [authController::class,'home'])->name('layout.home');
Route::get('login' , [authController::class,'login'])->name('login');
Route::get('register' , [authController::class,'register'])->name('register');

//Route::group(['middleware' => ['auth']], function () {
Route::get('tasks' , [TaskController::class,'index'])->name('tasks.index');
Route::delete('tasks-destroy/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
//});
