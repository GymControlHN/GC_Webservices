<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticularesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('particulares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_de_ingreso');
            $table->string('nombre',50);
            $table->integer('edad');
            $table->char('numero_de_identidad', 11)->unique();
            $table->string('profesion_u_oficio', 100);
            $table->char('celular', 8);
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
        Schema::dropIfExists('particulares');
    }
}
