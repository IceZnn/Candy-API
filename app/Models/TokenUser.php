<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokenUser extends Model
{
    protected $table = 'usuario';
    public $timestamps = false;
    
    protected $fillable = [
        'token',
        'user_id',
        'valido_ate',
    ];
}
