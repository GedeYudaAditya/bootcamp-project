<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

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

// Main Website
Route::get('/', [MainController::class, 'index']);

// Auth
Route::get('/login', [AuthController::class, 'index']);
Route::get('/registration', [AuthController::class, 'regist']);
