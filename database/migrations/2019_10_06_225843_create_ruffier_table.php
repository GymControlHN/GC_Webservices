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
            $table->double('pc_tricipital');
            $table->double('pc_infraescapular');
            $table->double('pc_supra_iliaco');
            $table->double('pc_biciptal');
            $table->double('porcentaje');
            $table->string('clasificacion',20);
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
