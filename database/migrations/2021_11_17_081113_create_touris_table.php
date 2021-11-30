<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('touris', function (Blueprint $table) {
            $table->integerIncrements('id_member')->unsigned();
            $table->string('namaTouris', 50);
            $table->string('noTlpn', 13);
            $table->integer('fk_id_akun')->unsigned();
            $table->timestamps();
            $table->foreign('fk_id_akun')->references('Id_akun')->on('akuns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('touris');
    }
}
