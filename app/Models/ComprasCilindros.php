<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprasCilindros extends Model
{
    use HasFactory;

    protected $table = "comprascilindros";

    protected $fillable = [
        'token',
        'cilindro_id',
        'fornecedor',
        'data',
        'qtde',
        'valor_un',
        'valor_total',
    ];
}
