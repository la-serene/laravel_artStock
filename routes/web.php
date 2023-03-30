<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(LoginController::class)
    ->middleware(GuestMiddleware::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/login', 'login')->name('login');
        Route::get('/signup', 'signup')->name('signup');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
    });

Route::controller(UserController::class)
    ->middleware(UserMiddleware::class)
    ->name('user.')
    ->prefix('/user')
    ->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/logout', 'logout')->name('logout');
    });

Route::fallback(function () {
   return view('fallback');
});
