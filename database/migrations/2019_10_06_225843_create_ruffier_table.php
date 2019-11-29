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
            $table->date('fecha_de_ingreso')->nullable();
            $table->double('pulso_r');
            $table->double('pulso_a');
            $table->double('pulso_d');
            $table->float('ruffiel');
            $table->string('leyenda',20)->nullable();
            $table->double('mvo');
            $table->double('mvoreal');
            $table->double('mvodiagnostico');
            $table->unsignedInteger('id_cliente');
            $table->foreign('id_cliente')->references("id")->on("clientes_gym");
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
