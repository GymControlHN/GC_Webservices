<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_de_ingreso');
            $table->string('nombre',50);
            $table->integer('edad');
            $table->char('identificacion', 11)->unique();
            $table->string('profesion', 100);
            $table->char('celular', 8);;
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
        Schema::dropIfExists('estadisticas');
    }
}
