<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrasaCorporalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grasa_corporal', function (Blueprint $table) {
            $table->increments('id');
            $table->double('pc_tricipital');
            $table->double('pc_infraescapular');
            $table->double('pc_supra_iliaco');
            $table->double('pc_biciptal');
            $table->integer('tipo')->nullable();
            $table->double('grasa')->nullable();
            $table->string('leyenda')->nullable();
            $table->unsignedInteger('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('clientes_gym');
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
        Schema::dropIfExists('grasa_corporal');
    }
}
