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
Route::middleware('auth')->group(function () {

    Route::get('/', [MainController::class, 'index']);

    Route::get('/nature', [MainController::class, 'nature']);

    Route::get('/culture', [MainController::class, 'culture']);

    Route::get('/account', [MainController::class, 'account']);

    Route::middleware('role:guide')->group(function () {
        Route::prefix('dashboard')->group(function () {

            Route::get('/', [MainController::class, 'dashboard']);
            Route::get('/delete/{type}/{id}', [MainController::class, 'deleteDestination'])->name('delete');
            Route::get('/edit/{type}/{id}', [MainController::class, 'editDestination'])->name('edit');
            Route::post('/edit/{type}/{id}', [MainController::class, 'actEditDest'])->name('editAct');

            Route::get("/addculture", [MainController::class, 'createCulture'])->name('addCultureView');
            Route::post("/addculture", [MainController::class, 'storeCulture'])->name('addCultureAct');

            Route::get('/addnature', [MainController::class, 'createNature'])->name('addNatureView');
            Route::post("/addnature", [MainController::class, 'storeNature'])->name('addNatureAct');
        });
    });

    Route::middleware('role:guide|touris')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/info/{type}/{id}', [MainController::class, 'infoDestination'])->name('info');
        });

        Route::get('/like/{type}/{id}', [MainController::class, 'addlike']);
        Route::get('/dislike/{type}/{id}', [MainController::class, 'adddislike']);
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/landing', [AuthController::class, 'index']);
Route::get('/tentang', [MainController::class, 'about']);

// Auth
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.act');

    Route::get('/registration', [AuthController::class, 'regist']);
    Route::post('/registration', [AuthController::class, 'store']);
});
