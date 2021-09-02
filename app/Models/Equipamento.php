<?php

namespace App\Models;

use App\Models\Manutencao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $table = "equipamento";

    protected $fillable = [
        'token',
        'numeroIp',
        'setor',
        'equipamento',
    ];

    public function manutencaos()
    {
        return $this->hasMany(Manutencao::class);
    }
}
