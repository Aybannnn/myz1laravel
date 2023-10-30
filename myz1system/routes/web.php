<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[CustomAuthController::class,'login']);
Route::get('/registration',[CustomAuthController::class,'registration']);
Route::post('/register-user', [CustomAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomAuthController::class, 'loginUser'])->name('login-user');
Route::get('/user-homepage', [CustomAuthController::class, 'userHomepage'])->middleware('isLoggedIn');
Route::get('/user-booking', [CustomAuthController::class, 'userBooking'])->middleware('isLoggedIn');
Route::get('/booking-form', [CustomAuthController::class, 'userBookingForm'])->middleware('isLoggedIn');
Route::get('/admin-homepage', [CustomAuthController::class, 'adminHomepage'])->middleware('isLoggedIn');
Route::get('/admin-post', [CustomAuthController::class, 'adminPost']);
Route::get('/admin-notification', [CustomAuthController::class, 'adminNotification']);
Route::get('/logout', [CustomAuthController::class, 'logout']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
