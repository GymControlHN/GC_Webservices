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
            $table->double('pulso_r')->nullable();
            $table->double('pulso_a')->nullable();
            $table->double('pulso_d')->nullable();
            $table->float('ruffiel')->nullable();
            $table->string('clasificacion',20)->nullable();
            $table->double('mvo2')->nullable();
            $table->double('mvoreal')->nullable();
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')->references("id")->on("clientes_gym")->onDelete('cascade')->onUpdate('cascade');
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
