<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/login-check', [LoginController::class, 'loginCheck']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/misi', [MissionController::class, 'index']);
Route::view('/poin-rewards', 'poin_rewards')->name('poin_rewards');
Route::get('/poin-rewards', [VoucherController::class, 'index']);
Route::post('/exchange', [ExchangeController::class, 'exchangePoints']);
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/voucher/{id}', [VoucherController::class, 'show'])->name('voucher_detail');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/home', [UserController::class, 'home'])->name('home');
