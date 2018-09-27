<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaM extends Model
{
  protected $table = 'pessoas';
  protected $primaryKey = 'id_pessoa';

  protected $fillable = [
    'id_pessoa',
    'nome',
    'sobrenome',
    'titulacao',
    'cpf',
    'rg',
    'email',
    'status',
    'created_at',
    'updated_at'
  ];
}
