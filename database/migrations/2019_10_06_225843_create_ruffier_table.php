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
            $table->date('fecha');
            $table->double('pulso_r');
            $table->double('pulso_1');
            $table->double('pulso_2');
            $table->double('ruffier');
            $table->string('clasificacion',20);
            $table->double('MVO2');
            $table->double('MVO2_real');
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
