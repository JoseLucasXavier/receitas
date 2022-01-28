<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receita extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'categoria_id',
        'titulo',
        'descricao',
        'ingredientes',
        'modo_preparo'
    ];
}
