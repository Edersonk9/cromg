<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PessoaM;

class FilmeM extends Model
{
  protected $table = 'filmes_assistidos';
  protected $primaryKey = 'id_filme';

  protected $fillable = [
    'id_filme',
    'id_pessoa',
    'titulo',
    'arquivo',
    'lancamento',
    'diretor',
    'nota',
    'sinopse',
    'status',
    'created_at',
    'updated_at'
  ];

  public function pessoa()    {
    return $this->hasOne(PessoaM::class,'id_pessoa','id_pessoa');
  }
}
