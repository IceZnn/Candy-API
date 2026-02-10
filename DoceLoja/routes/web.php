<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/Cadastro');

Route::get('/Cadastro', function () {
    return view('cadasDoce');
});

require __DIR__.'/auth.php';