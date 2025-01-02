<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExchangeController;

Route::post('/exchange', [ExchangeController::class, 'exchangePoints']);
Route::get('/', function () {
    return view('welcome');
});
Route::view('/poin-rewards', 'poin_rewards')->name('poin_rewards');
