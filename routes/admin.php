<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BaseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('guest:admin')->group(function(){
  Route::get('login', [AuthController::class, 'showLoginForm'])->name('admin.showLogin');
  Route::post('login', [AuthController::class, 'login'])->name('admin.login');
  Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('admin.password.request');
  Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('admin.password.email');
  Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('admin.password.reset');
  Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('admin.password.update');
});
Route::middleware('auth:admin')->group(function(){
  Route::get('/', [BaseController::class, 'index'])->name('admin.index');
});