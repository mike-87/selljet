<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Session;

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

// default ruta
Route::get('/', [UserController::class, 'welcomeScreen']);

// rute za registraciju i logovanje
Route::post('/registerUser', [UserController::class, 'registerUser']);
Route::post('/loginUser', [UserController::class, 'loginUser']);
Route::get('/home', [UserController::class, 'homeScreen']);
Route::get('/logout', [UserController::class, 'logout']);

// rute za oglase
Route::get('/ad/preview/{id}', [AdController::class, 'adPreview']);
Route::get('/ads/category/{id}', [AdController::class, 'adCategory']);
Route::post('/adPost', [AdController::class, 'saveAd']);

// rute za kategorije
Route::get('/categoryChildren/{id}', [CategoryController::class, 'getChildCategories']);