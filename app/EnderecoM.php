<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PessoaM;

class EnderecoM extends Model
{
  protected $table = 'enderecos';
  protected $primaryKey = 'id_endereco';

  protected $fillable = [
    'id_endereco',
    'id_pessoa',
    'uf',
    'cidade',
    'cep',
    'bairro',
    'logradouro',
    'numero',
    'complemento',
    'status',
    'principal',
    'updated_at',
    'created_at'
  ];
    public function pessoa()    {
      return $this->hasOne(PessoaM::class,'id_pessoa','id_pessoa');
    }
}
