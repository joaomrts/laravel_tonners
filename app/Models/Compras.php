<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;

    protected $table = "compras";

    protected $fillable = [
        'token',
        'tonner_id',
        'fornecedor',
        'data',
        'qtde',
        'valor_un',
        'valor_total',
    ];
}
