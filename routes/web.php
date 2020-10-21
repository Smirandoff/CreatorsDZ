<?php

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BaseController::class, 'index']);
Route::get('/video-test', [BaseController::class, 'videoTest'])->name('test.video');
Route::post('/video-test', [BaseController::class, 'uploadVideoTest'])->name('test.upload');