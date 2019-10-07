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
            $table->double('peso_kg');
            $table->double('talla');
            $table->double('imc');
            $table->string('clasificacion',20);
            $table->double('pecho');
            $table->double('brazo');
            $table->double('ABD-A');
            $table->double('ABD-B');
            $table->double('cadera');
            $table->double('muslo');
            $table->double('pierna');
            $table->date('fecha');
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
