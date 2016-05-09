<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTabelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabelas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_configuracao')->foreign('id_configuracao')->references('id')->on('configuracoes');

            $table->integer('id_parametro')->references('id')->on('parametros');

            $table->string('nome');
            $table->timestamps();
        });
    }

    /**
     * configuracoes,
     migrations,
     parametros ,
     password_resets                 ,
     tabelas                         ,
     users
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tabelas');
    }
}
