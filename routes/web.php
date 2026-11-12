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
/*------Rota usada para o store-armazenar um registro---*/
Route::post('/store-user', [UserController::class, 'store'])->name('store.user');


/*-----Rotas para a edição de um registro----*/
Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('edit.user');
Route::put('/update-user/{user}', [UserController::class, 'update'])->name('update.user');
