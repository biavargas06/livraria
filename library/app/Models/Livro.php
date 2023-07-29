<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';

    protected $fillable = [
        'nome',
        'pag',
        'autor',
        'editora',
        'ano',
        'sinopse',
        'imagem',
        'preco',
    ];
    public function generos()
    {
        return $this->belongsToMany(Genero::class, 'livro_gens', 'livro_id', 'genero_id');
    }



}