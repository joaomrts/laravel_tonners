<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManutencaoImpressorasMendesJr extends Model
{
    use HasFactory;

    protected $table = "manutencaoimpressorasmendesjr";

    protected $fillable = [
        'token',
        'impressoraMendesjr_id',
        'responsavel',
        'data',
        'descricao',
        'valor',
    ];
}
