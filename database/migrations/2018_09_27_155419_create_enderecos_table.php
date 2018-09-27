<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('enderecos', function (Blueprint $table) {
      $table->engine = 'InnoDB';

      $table->increments('id_endereco');
      $table->integer('id_pessoa')->unsigned();
      $table->string('uf', 45)->default(null);
      $table->string('cidade', 145)->default(null);
      $table->string('cep', 15)->default(null);
      $table->string('bairro', 145)->default(null);
      $table->string('logradouro', 145)->default(null);
      $table->string('numero', 15)->default(null);
      $table->string('complemento', 45)->default(null);
      $table->integer('status')->default('1');
      $table->integer('principal')->default('1');
      $table->time('updated_at')->nullable()->default(null);
      $table->time('created_at')->nullable()->default(null);

      $table->index('id_pessoa','fk_enderecos_pessoas_idx');

      $table->foreign('id_pessoa')
      ->references('id_pessoa')->on('s');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('enderecos');
  }
}
