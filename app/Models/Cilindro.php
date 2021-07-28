<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cilindro extends Model
{
    use HasFactory;

    protected $table = "cilindro";

    protected $fillable = [
        'token',
        'modelo',
        'qtde_impressora',
        'estoque',
    ];

}
