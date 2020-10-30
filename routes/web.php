<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\ProfileController;
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

Route::get('/video-test', [BaseController::class, 'videoTest'])->name('test.video');
Route::post('/video-test', [BaseController::class, 'uploadVideoTest'])->name('test.upload');

Route::middleware(['auth'])->group(function(){
  Route::get('/', [BaseController::class, 'index'])->name('index');
  Route::prefix('profiles/{user}')->group(function(){
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('edit', [ProfileController::class, 'edit'])->middleware('auth.specific')->name('profile.edit');
  });
});