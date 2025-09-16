<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\AuthController;

Route::get('/users/create', [ProfileController::class, 'create'])->name('viewForm');
Route::post('/users/create', [ProfileController::class, 'store'])->name('create');

Route::resource('/trainings', TrainingController::class);

//Rotas do login
Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('loginForm');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
//Route::post('/auth')

Route::resource('/exercise', ExerciseController::class);
Route::post('/trainings/{training}/exercises', [ExerciseController::class, 'store'])->name('exercises.store');

Route::get('/exercises/{exercise}', [ExerciseController::class, 'show'])->name('exercises.show');
