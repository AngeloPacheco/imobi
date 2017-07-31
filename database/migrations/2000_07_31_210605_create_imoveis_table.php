<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao',100);
            $table->char('cd_finalidade',2);
            $table->string('finalidade',45);
            $table->char('cd_status',2);
            $table->string('status',45);
            $table->string('cep',10);
            $table->string('logradouro',45);
            $table->string('cidade',45);
            $table->char('estado',2);
            $table->decimal('valor',8,2);
            


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
        Schema::dropIfExists('imoveis');
    }
}
