<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->integerIncrements('id_guide')->unsigned();
            $table->string('NamaGuide', 50);
            $table->string('noTlp', 13);
            $table->integer('fk_Id_Akun')->unsigned();
            $table->string('alamat', 100);
            $table->timestamps();
            $table->foreign('fk_Id_Akun')->references('Id_akun')->on('akuns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guides');
    }
}
