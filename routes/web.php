<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;

use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ExperienceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/skills', [SkillController::class, 'getSkill']);

Route::get('/trainings', function () {
    return view('trainings');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/projects', [ProjectController::class, 'getProject']);

Route::get('/experiences', [ExperienceController::class, 'getExperience']);

Route::get('/trainings', [TrainingController::class, 'getTraining']);

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();
