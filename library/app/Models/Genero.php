<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'generos';

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'livro_gen', 'genero_id', 'livro_id');
    }
}
