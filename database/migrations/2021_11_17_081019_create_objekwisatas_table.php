<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjekwisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objekwisatas', function (Blueprint $table) {
            $table->integerIncrements('id_objek_wisata')->unsigned();
            $table->string('namaObjek', 100);
            $table->integer('price');
            $table->date('date');
            $table->integer('fk_id_guide')->unsigned();
            $table->timestamps();
            $table->foreign('fk_id_guide')->references('id_guide')->on('guides');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objekwisatas');
    }
}
