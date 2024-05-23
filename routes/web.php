<?php

use App\Http\Middleware\TokenVerifyToken;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::view('/registration', 'pages.registration')->name('registration');
Route::view('/login', 'pages.login')->name('login');
Route::view('/send-otp', 'pages.send-otp')->name('send-otp');
Route::view('/verify-otp', 'pages.verify-otp')->name('verify-otp');
Route::view('/reset-pass', 'pages.reset-password')->name('reset-pass');



Route::post('/registration', [UserController::class, 'registration']);
Route::post('/login', [UserController::class, 'login']);


Route::post('/send-otp', [UserController::class, 'sendOtp']);
Route::post('/verify-otp', [UserController::class, 'verifyOtp']);
Route::post('/reset-pass', [UserController::class, 'resetPassword'])
    ->middleware(TokenVerifyToken::class);



Route::get('/check', function () {
    return 'hello world';
})->middleware(TokenVerifyToken::class);
