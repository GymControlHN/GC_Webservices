<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes', function (Blueprint $table) {
            $table->increments('id');
            $table->double('peso');
            $table->double('altura');
            $table->double('imc');
            $table->string('leyenda',20);
            $table->double('pecho');
            $table->double('brazo');
            $table->double('ABD_A');
            $table->double('ABD_B');
            $table->double('cadera');
            $table->double('muslo');
            $table->double('pierna');
            $table->unsignedInteger("id_cliente");
            $table->date('fecha_de_ingreso');
            $table->foreign("id_cliente")->references("id")->on("clientes_gym");
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
        Schema::dropIfExists('antecedentes');
    }
}
