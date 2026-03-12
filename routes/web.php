<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Middleware\auth_api;

Route::get('/', function () {
    return view('login');
})->name('Login');

Route::get('/doces', function () {
    return view('doces');
})->name('doces');

Route::get('/Inicio', function () {
    return view('inicial');
})->name('Inicio');

Route::get('/Dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/Cadastro', function () {
    return view('cadasDoce');
})->name('cadastro');

Route::get('/Sobre', function () {
    return view('Sobre');
})->name('sobre');

Route::get('/Cadastro_usuario', function () {
    return view('cadastro');
});

Route::get('/Login', function () {
    return view('login');
})->name('login');


/* TOKEN */

Route::middleware(auth_api::class)->group(function () {

    Route::get('/doce/{id}', [TestController::class, 'exibe_doce_view'])->name('doces.detalhe');

    Route::get('/editar/{id}', [TestController::class, 'editar_doce'])->name('doces.editar');

    Route::get('/deletar/{id}', [TestController::class, 'mostrar_formulario_delete'])->name('mostrar_delete');

    Route::delete('/deletar/{id}', [TestController::class, 'deleta_doce'])->name('deleta_doces');

});

require __DIR__.'/auth.php';