<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/skills', function() {
    return view('skills');
});

Route::get('/trainings', function() {
    return view('trainings');
});

Route::get('/projects', function() {
    return view('projects');
});

Route::get('/contact', function() {
    return view('contact');
});
