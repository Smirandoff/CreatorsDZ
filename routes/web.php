<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\MessengerController;
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
    Route::get('edit', [ProfileController::class, 'edit'])->middleware('auth.specific')->name('profile.edit');
    Route::put('/', [ProfileController::class, 'update'])->middleware('auth.specific')->name('profile.update');
    Route::put('edit-password', [ProfileController::class, 'updatePassword'])->middleware('auth.specific')->name('profile.updatePassword');
    Route::put('edit-profile-photo', [ProfileController::class, 'updateProfilePhoto'])->middleware('auth.specific')->name('profile.updateProfilePhoto');
  });
  Route::prefix('messenger')->group(function(){
    Route::get('/', [MessengerController::class, 'index'])->name('messenger.index');
    Route::get('create', [MessengerController::class, 'create'])->name('messenger.create');
    Route::post('create', [MessengerController::class, 'store'])->name('messenger.post');
    Route::prefix('{thread}')->group(function(){
      Route::get('/', [MessengerController::class, 'show'])->name('messenger.show');
      Route::put('/', [MessengerController::class, 'update'])->name('messenger.update');
    });
  });
});