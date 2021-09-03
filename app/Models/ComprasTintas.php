<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprasTintas extends Model
{
    use HasFactory;

    protected $table = "comprastintas";

    protected $fillable = [
        'token',
        'tinta_id',
        'fornecedor',
        'data',
        'qtde',
        'valor_un',
        'valor_total',
    ];
}
