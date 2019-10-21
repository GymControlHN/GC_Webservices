<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientespTable extends Migration
{
    public function up()
    {
        Schema::create('clientesp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mes');
            $table->date('fecha_pago');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientesp');
    }
}
