<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificationController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('home', [NotificationController::class, 'index'])->name('home');
Route::patch('mobile-token', [NotificationController::class, 'updateToken'])->name('save_mobile_token');
Route::post('send-notification',[NotificationController::class,'notification'])->name('notification');
