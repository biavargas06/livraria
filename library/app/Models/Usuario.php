<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'password', 'isAdmin']; // Adicione a coluna "isAdmin" na lista de atributos preenchíveis

    protected $hidden = ['password'];

    protected $casts = [
        'isAdmin' => 'boolean',
    ];
}