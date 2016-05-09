<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTabelascolunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabelascolunas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tabela1');
            $table->integer('id_tabela2');
            $table->string('coluna1');
            $table->string('coluna2');
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
        Schema::drop('tabelascolunas');
    }
}
