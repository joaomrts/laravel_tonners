<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotsModel extends Model
{
    use HasFactory;

    protected $table = "bots";

    protected $fillable = [
        'nome_grupo',
        'bot_id',
        'chat_id',
    ];
}