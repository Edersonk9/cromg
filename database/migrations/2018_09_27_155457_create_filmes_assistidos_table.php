<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmesAssistidosTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('filmes_assistidos', function (Blueprint $table) {
      $table->engine = 'InnoDB';

      $table->increments('id_filme');
      $table->integer('id_pessoa')->unsigned();
      $table->string('titulo', 145)->default(null);
      $table->integer('lancamento')->default(null);
      $table->string('diretor', 45)->default(null);
      $table->decimal('nota', 3, 2)->default(null);
      $table->text('sinopse');
      $table->string('arquivo', 245)->default(null);
      $table->integer('status')->default('1');
      $table->time('created_at')->nullable()->default(null);
      $table->time('updated_at')->nullable()->default(null);

      $table->index('id_pessoa','fk_filmes_assistidos_pessoas1_idx');

      $table->foreign('id_pessoa')
      ->references('id_pessoa')->on('s');
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
    Schema::dropIfExists('filmes_assistidos');
  }
}
