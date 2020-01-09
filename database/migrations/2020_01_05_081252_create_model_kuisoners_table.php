<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelKuisonersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuisoner', function (Blueprint $table) {
            $table->bigIncrements('id_kuisoner');
            $table->bigInteger('id_penunjang_fasilitas');
            $table->string('id_penilaian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_kuisoners');
    }
}
