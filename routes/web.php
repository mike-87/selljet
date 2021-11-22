<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    if(is_null(session('user'))){
        return view('welcome');
    } else {
        return view('home');
    }
    //return view('welcome');
});

Route::post('/registerUser', [UserController::class, 'registerUser']);
Route::post('/loginUser', [UserController::class, 'loginUser']);

Route::get('/home', function () {
    //dd(session('user'),'ses');
    if(is_null(session('user'))){
        return view('welcome');
    } else {
        return view('home', ['user' => session('user')]);
    }
    
});

Route::get('/logout', [UserController::class, 'logout']);
