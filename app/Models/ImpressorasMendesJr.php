<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpressorasMendesJr extends Model
{
    use HasFactory;

    protected $table = "impressorasmendesjr";

    protected $fillable = [
        'modelo',
        'tonner',
        'setor',
    ];
}
