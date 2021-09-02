<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manutencao extends Model
{
    use HasFactory;

    protected $table = "manutencao";

    protected $fillable = [
        'token',
        'equipamento_id',
        'responsavel',
        'data',
        'tipo',
        'servico',
        'descricao',
    ];
}
