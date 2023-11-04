<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminController;

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
Route::get('/category_details/{id}', [CustomAuthController::class, 'categoryDetails'])->middleware('isLoggedIn');
Route::get('/category_services/{id}', [CustomAuthController::class, 'categoryServices'])->middleware('isLoggedIn');
Route::get('/inclusion_details/{id}', [CustomAuthController::class, 'inclusionDetails'])->middleware('isLoggedIn');
Route::post('/register-request', [CustomAuthController::class, 'registerRequest'])->name('register-request');
Route::get('/booking-form', [CustomAuthController::class, 'userBookingForm'])->middleware('isLoggedIn');
Route::get('/admin-homepage', [AdminController::class, 'adminHomepage'])->middleware('isLoggedIn');
Route::get('/admin-post', [AdminController::class, 'adminPost']);
Route::get('/admin-notification', [AdminController::class, 'adminNotification'])->middleware('isLoggedIn');
Route::get('/view_request/{id}', [AdminController::class, 'viewRequest'])->middleware('isLoggedIn');
Route::get('/delete_request/{id}', [AdminController::class, 'deleteRequest'])->middleware('isLoggedIn');
Route::get('/accept_request/{id}', [AdminController::class, 'acceptRequest'])->middleware('isLoggedIn');
Route::get('/update_request/{id}', [AdminController::class, 'updateRequest'])->middleware('isLoggedIn');
Route::post('/update-request/{id}', [AdminController::class, 'updateRequestConfirmation'])->middleware('isLoggedIn');
Route::get('/deact_request/{id}', [AdminController::class, 'deactRequest'])->middleware('isLoggedIn');
Route::get('/logout', [CustomAuthController::class, 'logout']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
