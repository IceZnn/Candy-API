<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

//Route::get('/', function () {
//    return view('');
//})->name('home');

Route::get('/Dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/Cadastro', function () {
    return view('cadasDoce');
})->name('cadastro');

Route::get('/Sobre', function () {
    return view('Sobre');
})->name('sobre');

// crud a fazer tanto que é so especulação
//Route::get('/doces', [TestController::class, 'todos_doces'])->name('doces.lista');
Route::get('/doce/{id}', [TestController::class, 'exibe_doce_view'])->name('doces.detalhe');
//Route::get('/editar/{id}', [TestController::class, 'editar_doce'])->name('doces.editar');
//Route::put('/atualizar/{id}', [TestController::class, 'atualizar_doce'])->name('doces.atualizar');
//Route::delete('/deletar/{id}', [TestController::class, 'deletar_doce'])->name('doces.deletar');

require __DIR__.'/auth.php';