<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('pessoas', function (Blueprint $table) {
      $table->engine = 'InnoDB';

      $table->increments('id_pessoa');
      $table->string('nome', 65)->default(null);
      $table->string('sobrenome', 45)->default(null);
      $table->string('titulacao', 45)->default(null);
      $table->string('cpf', 15)->default(null);
      $table->string('rg', 15)->default(null);
      $table->string('email', 95)->default(null);
      $table->integer('status')->default('1');
      $table->time('created_at')->nullable()->default(null);
      $table->time('updated_at')->nullable()->default(null);
      $table->timestamps();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('pessoas');
  }
}
