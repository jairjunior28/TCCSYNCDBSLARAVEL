<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVinculotabelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinculotabelas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tabela1')->references('id')->on('tabelas');
            $table->integer('id_tabela2')->references('id')->on('tabelas');
            
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
        Schema::drop('vinculotabelas');
    }
}
