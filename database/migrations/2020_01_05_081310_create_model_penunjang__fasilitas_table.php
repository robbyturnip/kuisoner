<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelPenunjangFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penunjang__fasilitas', function (Blueprint $table) {
            $table->bigIncrements('id_penunjang_fasilitas');
            $table->bigInteger('id_fasilitas');
            $table->bigInteger('id_penunjang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_penunjang__fasilitas');
    }
}
