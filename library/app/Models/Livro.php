<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;


    public function livrogen(){
        return $this->hasMany('App\LivroGen');
    }
    protected $fillable = [
        'nome',
        'pag',
        'autor',
        'editora',
        'ano',
        'sinopse',
    ];

}
