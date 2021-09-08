<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManutencaoImpressoras extends Model
{
    use HasFactory;

    protected $table = "manutencaoimpressoras";

    protected $fillable = [
        'token',
        'impressora_id',
        'responsavel',
        'data',
        'defeito',
        'valor',
    ];

}
