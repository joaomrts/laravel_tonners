<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManutencaoImpressorasXavantes extends Model
{
    use HasFactory;

    protected $table = "manutencaoimpressorasxavantes";

    protected $fillable = [
        'token',
        'impressoraXavantes_id',
        'responsavel',
        'data',
        'defeito',
        'valor',
    ];
}
