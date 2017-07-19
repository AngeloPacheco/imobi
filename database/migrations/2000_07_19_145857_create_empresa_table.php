<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('responsavel',80)->nullable();
            $table->string('cnpj',45)->nullable();
            $table->string('inscricao_estadual',45)->nullable();
            $table->string('logradouro',45)->nulllable();
            $table->string('numero',10)->nulllable();
            $table->string('complemento',20)->nulllable();
            $table->string('bairro',45)->nulllable();
            $table->string('localidade',45)->nulllable();
            $table->string('cep',45)->nulllable();
            $table->char('uf',2)->nulllable();
            $table->string('email',80)->nullable();
            $table->string('site',0)->nullable();
            $table->string('telefone',50)->nullable();
            $table->string('fax',50)->nullable();
            $table->string('celular',50)->nullable();  
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
        Schema::dropIfExists('empresas');
    }
}
