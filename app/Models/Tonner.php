<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tonner extends Model
{
    use HasFactory;

    protected $table = "tonner";

    protected $fillable = [
        'token',
        'modelo',
        'qtde_impressora',
        'estoque',
    ];

    public function compras()
    {
        return $this->hasMany(Compras::class);
    }
}
