<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoceModel extends Model
{
    protected $table = 'doces';
    public $timestamps = false;
    
    protected $fillable = [
        'Nome',
        'Sabor',
        'Ingredientes',
        'Preco',
        'Alergicos',
        'Quantidade',
        'Descricao',
    ];
}