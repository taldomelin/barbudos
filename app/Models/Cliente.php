<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'celular',
        'e-mail',
        'cpf',
        'dataNascimento',
        'cidade',
        'estado',
        'pais',
        'rua',
        'numero',
        'bairro',
        'cep',
        'complemento',
        'password'
    ];  
}
