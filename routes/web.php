<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
Route::get('/objek/{id}', [App\Http\Controllers\DashboardController::class, 'objek'])->name('objek');
Route::get('/video/{id}', [App\Http\Controllers\DashboardController::class, 'video'])->name('video');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/postLogin', [App\Http\Controllers\LoginController::class, 'postLogin'])->name('postLogin');

Route::get('/forgot', [App\Http\Controllers\ForgotPasswordController::class, 'forgot'])->name('forgot');
Route::post('/postForgot', [App\Http\Controllers\ForgotPasswordController::class, 'postForgot'])->name('postForgot');
Route::get('/reset/{token}', [App\Http\Controllers\ForgotPasswordController::class, 'reset'])->name('reset');
Route::post('/postReset', [App\Http\Controllers\ForgotPasswordController::class, 'postReset'])->name('postReset');

Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    Route::get('/password', [App\Http\Controllers\ForgotPasswordController::class, 'password'])->name('password');
    Route::post('/postPassword', [App\Http\Controllers\ForgotPasswordController::class, 'postPassword'])->name('postPassword');


    Route::get('/sparepart', [App\Http\Controllers\SparepartController::class, 'index'])->name('sparepart');
    Route::get('/show/{id}', [App\Http\Controllers\SparepartController::class, 'show'])->name('show');

    Route::get('/create', [App\Http\Controllers\SparepartController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\SparepartController::class, 'store'])->name('store');

    Route::get('/edit/{id}', [App\Http\Controllers\SparepartController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [App\Http\Controllers\SparepartController::class, 'update'])->name('update');

    Route::get('/delete/{id}', [App\Http\Controllers\SparepartController::class, 'destroy'])->name('delete');
});
