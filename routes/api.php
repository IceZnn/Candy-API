<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post( '/salva_doce',[TestController::class,'salva_doce']);

Route::get( '/exibe_doce/{id}',[TestController::class,'exibe_doce']);

Route::get( '/todos_doces',[TestController::class,'todos_doces']);

