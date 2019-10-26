<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClientesGym extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes_gym', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50);
            $table->integer('edad');
            $table->char('numero_de_cuenta', 11)->unique()->nullable();
            $table->string('numero_de_empleado',11)->unique()->nullable();
            $table->char('numero_de_identidad', 11)->unique()->nullable();
            $table->string('profesion_u_oficio', 100);
            $table->date('fecha_de_ingreso');
            $table->string('carrera', 100);
            $table->string('tipo');
            $table->char('telefono', 8);
            $table->timestamps();

        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes_gym');

    }
}
