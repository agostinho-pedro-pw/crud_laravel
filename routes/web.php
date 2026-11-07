<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*------Rota para a welcome--------*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
/*--------Rota para a listagem------------*/
Route::get('/index-user', [UserController::class, 'index'])->name('index.user');
/*-------Rota usada para a create-criação do registro---*/
Route::get('/create-user', [UserController::class, 'create'])->name('create.user');
/*-------Rota usada para o store-armazenamento--------*/
Route::post('/store-user', [UserController::class, 'store'])->name('store.user');
