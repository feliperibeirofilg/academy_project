<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\AuthController;

Route::view('/', 'index');

Route::get('/users/create', [ProfileController::class, 'create'])->name('viewForm');
Route::post('/users/create', [ProfileController::class, 'store'])->name('create');



//Rotas do login
Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('loginForm');
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
//Route sair da conta
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {


Route::resource('/exercise', ExerciseController::class);
Route::resource('/traininfs', ExerciseController::class);
Route::post('/trainings/{training}/exercise', [ExerciseController::class, 'store'])->name('exercise.store');

Route::resource('/trainings', TrainingController::class);

Route::get('/exercise/{exercise}', [ExerciseController::class, 'show'])->name('exercise.show');
});