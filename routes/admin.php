<?php

use App\Http\Controllers\Admin\CategoryProjectController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::resource('experience', ExperienceController::class);
Route::resource('users', UsersController::class); 
Route::resource('project', ProjectController::class); // project
Route::resource('categoryProject', CategoryProjectController::class); // categorie project
Route::resource('skill', SkillController::class); // Compétences
Route::resource('training', TrainingController::class); // Formations