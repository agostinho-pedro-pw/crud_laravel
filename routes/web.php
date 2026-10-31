<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create-user',[UserController::class, 'create'])->name('create.user');
Route::post('/store-user',[UserController::class, 'store'])->name('store.user');
