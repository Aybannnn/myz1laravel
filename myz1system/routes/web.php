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
Route::get('/user_check/{id}', [CustomAuthController::class, 'userCheck'])->middleware('isLoggedIn');
Route::post('/register-request', [CustomAuthController::class, 'registerRequest'])->name('register-request');
Route::post('/register-report', [CustomAuthController::class, 'registerReport'])->name('register-report');
Route::get('/add-booking', [CustomAuthController::class, 'userBookingForm'])->middleware('isLoggedIn');
Route::get('/create-report', [CustomAuthController::class, 'userCreateReport'])->middleware('isLoggedIn');
Route::get('/track-report/{id}', [CustomAuthController::class, 'userTrackReport'])->middleware('isLoggedIn')->name('track-report');
Route::get('/track-status/{id}', [CustomAuthController::class, 'userTrackReportStatus'])->middleware('isLoggedIn');
Route::get('/frequently-asked-questions', [CustomAuthController::class, 'userQuestion'])->middleware('isLoggedIn');
Route::get('/feedback', [CustomAuthController::class, 'userFeedback'])->middleware('isLoggedIn');
Route::post('/add-feedback', [CustomAuthController::class, 'addFeedback'])->middleware('isLoggedIn');
Route::get('/logout', [CustomAuthController::class, 'logout']);

Route::get('/admin-homepage', [AdminController::class, 'adminHomepage'])->middleware('isLoggedIn');
Route::get('/admin-calendar', [AdminController::class, 'adminCalendar'])->middleware('isLoggedIn');
Route::get('/admin-monthly', [AdminController::class, 'adminMonthly'])->middleware('isLoggedIn');
Route::get('/admin-post', [AdminController::class, 'adminPost'])->middleware('isLoggedIn');
Route::post('/add-post', [AdminController::class, 'adminAddPost'])->middleware('isLoggedIn');
Route::get('/admin-notification', [AdminController::class, 'adminNotification'])->middleware('isLoggedIn');
Route::get('/view_request/{id}', [AdminController::class, 'viewRequest'])->middleware('isLoggedIn');
Route::get('/delete_request/{id}', [AdminController::class, 'deleteRequest'])->middleware('isLoggedIn');
Route::post('/accept_request/{id}', [AdminController::class, 'acceptRequest'])->middleware('isLoggedIn');
Route::get('/update_request/{id}', [AdminController::class, 'updateRequest'])->middleware('isLoggedIn');
Route::post('/update-request/{id}', [AdminController::class, 'updateRequestConfirmation'])->middleware('isLoggedIn');
Route::get('/deact_request/{id}', [AdminController::class, 'deactRequest'])->middleware('isLoggedIn');
Route::get('/admin-booking', [AdminController::class, 'adminBooking'])->middleware('isLoggedIn');
Route::get('/admin-report', [AdminController::class, 'adminReport'])->middleware('isLoggedIn');
Route::get('/admin-feedback', [AdminController::class, 'adminFeedback'])->middleware('isLoggedIn');
Route::post('/add-question', [AdminController::class, 'adminAddQuestion'])->middleware('isLoggedIn');
Route::get('/search', [AdminController::class, 'search'])->middleware('isLoggedIn');
Route::get('/filter', [AdminController::class, 'filter'])->middleware('isLoggedIn');
Route::post('/update-status/{id}', [AdminController::class, 'adminUpdateStatus'])->middleware('isLoggedIn')->name('update-status');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
