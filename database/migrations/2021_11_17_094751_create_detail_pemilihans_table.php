<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPemilihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemilihans', function (Blueprint $table) {
            $table->integerIncrements('id_DetailPemilihan')->unsigned();
            $table->integer('fk_id_objekWisata')->unsigned();
            $table->integer('fk_id_member')->unsigned();
            $table->timestamps();
            $table->foreign('fk_id_objekWisata')->references('id_objek_wisata')->on('objekwisatas');
            $table->foreign('fk_id_member')->references('id_member')->on('touris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pemilihans');
    }
}
