<?php

use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\UserController;

use Illuminate\Support\Facades\Route;

Route::resource('experience', ExperienceController::class);
Route::resource('users', UsersController::class);
Route::resource('project', ProjectController::class);
Route::resource('skill', SkillController::class);
Route::resource('training', TrainingController::class);
