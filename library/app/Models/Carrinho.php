<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    protected $fillable = ['livro_id', 'usuario_id', 'quantidade'];

    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }
}