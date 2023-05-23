<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\TrustHosts;
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
    ->middleware(['web', GuestMiddleware::class])
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/login', 'login')->name('login');
        Route::get('/signup', 'signup')->name('signup');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::post('/store', 'store')->name('store');
    });

Route::controller(LoginController::class)
    ->middleware(['web', GuestMiddleware::class])
    ->name('password.')
    ->group(function () {
        Route::get('/forgot_password', 'forgot_password')->name('request');
        Route::post('/forgot_password', 'forgot_password_handle')->name('email');
        Route::get('/reset_password', 'reset_password')->middleware(TrustHosts::class)->name('reset');
        Route::post('/reset_password', 'update_password')->name('update');

    });

Route::controller(UserController::class)
    ->prefix('/user')
    ->middleware(['web', UserMiddleware::class])
    ->name('user.')
    ->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/logout', 'logout')->name('logout');
    });

Route::controller(ContentController::class)
    ->prefix('/user/post')
    ->middleware(['web', UserMiddleware::class])
    ->name('post.')
    ->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/create/store', 'store')->name('store');
        Route::get('/{postId}', 'index')->name('index');
        Route::get('/update/{postId}/{updateType}', 'updateQuantity')->name('updateQuantity');
    });

Route::controller(CommentController::class)
    ->prefix("user/post")
    ->middleware(['web', UserMiddleware::class])
    ->name('comment.')
    ->group(function () {
        Route::post('/{postId}/store', 'store')->name('store');
    });

Route::fallback(function () {
   return view('fallback');
});
