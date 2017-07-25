<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',45);
            $table->char('tipo_pessoa',1);
            $table->string('cpf_cnpj',45);
            $table->string('rg_ie',45)->nulllable();
            $table->string('cep',45);
            $table->string('logradouro',45);
            $table->string('numero',10);
            $table->string('complemento',10)->nulllable();
            $table->string('bairro',45);
            $table->string('localidade',45);
            $table->string('estado',45);
            $table->string('email',45)->nulllable();
            $table->string('fone_res',20)->nulllable();
            $table->string('fone_com',20)->nulllable();
            $table->string('celular',20)->nulllable();
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categoria_clientes');
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
        Schema::dropIfExists('clientes');
    }
}
