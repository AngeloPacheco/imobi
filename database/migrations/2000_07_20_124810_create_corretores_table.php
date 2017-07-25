<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorretoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corretores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',45);
            $table->string('fone_res',45)->nulllable();;
            $table->string('fone_com',45)->nulllable();;
            $table->string('ramal',45)->nulllable();;
            $table->string('celular',45);
            $table->string('email',45);
            $table->string('creci',20)->nulllable();
            $table->decimal('comissao',8,2)->nulllable();
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
        Schema::dropIfExists('corretores');
    }
}
