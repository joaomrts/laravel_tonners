<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpressorasXavantes extends Model
{
    use HasFactory;

    protected $table = "impressorasxavantes";

    protected $fillable = [
        'token',
        'modelo',
        'tonner',
        'setor',
    ];
}
