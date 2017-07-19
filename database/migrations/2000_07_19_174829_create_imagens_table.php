<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagens', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nm_imagem',80);
                $table->string('titulo',80)->nullable();
                $table->integer('conteudo_id')->nullable();
                $table->char('conteudo_tipo',2)->nullable();
                $table->string('path',45)->nullable();
                $table->integer('ordem')->nullable();
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
        Schema::dropIfExists('imagens');
    }
}
