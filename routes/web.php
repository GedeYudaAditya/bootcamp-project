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

    Route::get('/tentang', [MainController::class, 'about']);

    Route::middleware('role:guide')->group(function () {
        Route::prefix('create')->group(function () {

            Route::get('/', [MainController::class, 'create']);
            Route::get('/delete/{type}/{id}', [MainController::class, 'deleteDestination'])->name('delete');
            Route::get('/edit/{type}/{id}', [MainController::class, 'editDestination'])->name('edit');
            Route::post('/edit/{type}/{id}', [MainController::class, 'actEditDest'])->name('editAct');

            Route::get("/culture", [MainController::class, 'createCulture'])->name('addCultureView');
            Route::post("/culture", [MainController::class, 'storeCulture'])->name('addCultureAct');

            Route::get('/nature', [MainController::class, 'createNature'])->name('addNatureView');
            Route::post("/nature", [MainController::class, 'storeNature'])->name('addNatureAct');
        });
    });

    Route::middleware('role:guide|touris')->group(function () {
        Route::prefix('create')->group(function () {
            Route::get('/info/{type}/{id}', [MainController::class, 'infoDestination'])->name('info');
        });
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/landing', [AuthController::class, 'index']);
// Auth
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.act');

    Route::get('/registration', [AuthController::class, 'regist']);
    Route::post('/registration', [AuthController::class, 'store']);
});
