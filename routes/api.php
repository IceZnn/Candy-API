<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\auth_api;



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/Cadastro_usuario', [UsuarioController::class,'cadastra_usuario']);

Route::post('/Login', [UsuarioController::class, 'login']);
//Coisas que precisam de token!
Route::middleware(auth_api::class)->group(function () {

Route::post( '/salva_doce',[TestController::class,'salva_doce']);

Route::get( '/exibe_doce/{id}',[TestController::class,'exibe_doce']);

Route::get( '/todos_doces',[TestController::class,'todos_doces']);

Route::put('/atualiza_doce/{id}', [TestController::class, 'atualiza_doce']);


});