<?php

use App\Models\Training;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TrainingController;

use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\Admin\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/skills', [SkillController::class, 'getIndex']);

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

/**
 * Admin 
 */
Auth::routes();



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UsersController::class);
});

Route::group(['middleware' => ['web']], function () {
    Route::resource('project', ProjectController::class);
});
