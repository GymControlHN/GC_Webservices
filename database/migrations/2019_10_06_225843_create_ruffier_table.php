<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuffierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruffier', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha')->nullable();
            $table->double('pulso_r')->nullable();
            $table->double('pulso_a')->nullable();
            $table->double('pulso_d')->nullable();
            $table->double('ruffier')->nullable();
            $table->string('clasificacion',20)->nullable();
            $table->double('mvo2')->nullable();
            $table->double('mvoreal')->nullable();
            $table->unsignedInteger('id_cliente');
            $table->foreign('id_cliente')->references("id")->on("cliente_gym");
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
        Schema::dropIfExists('ruffier');
    }
}
