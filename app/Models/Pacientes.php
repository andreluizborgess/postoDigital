<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'data_nascimento',
        'endereco',
        'email',
        'cpf',
        'celular',
        'senha',
    ];
}
