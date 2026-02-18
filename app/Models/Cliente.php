<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    //se eu nao tivesse um id com nome id eu tinha que fazer protected primary key = ...

    protected $fillable = ['nome', 'telefone', 'email', 'cpf', 'dt_nascimento'];
}
