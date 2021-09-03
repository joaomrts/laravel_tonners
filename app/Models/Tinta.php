<?php

namespace App\Models;

use App\Models\ComprasTintas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tinta extends Model
{
    use HasFactory;

    protected $table = "tinta";

    protected $fillable = [
        'token',
        'modelo',
        'qtde_impressora',
        'estoque',
    ];

    public function comprastintas()
    {
        return $this->hasMany(ComprasTintas::class);
    }
}
