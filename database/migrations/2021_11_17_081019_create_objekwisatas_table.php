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
            $table->string('day');
            $table->enum('type', ['culture', 'nature']);
            $table->enum('category', [
                'tari', 'musik', 'drama', 'tradisi', 'kuliner',
                'air terjun', 'danau', 'pegunungan', 'taman', 'pantai'
            ]);
            $table->bigInteger('fk_id_user')->unsigned();
            $table->string('fasilitas');
            $table->enum('kabupaten', [
                'badung',
                'bangli',
                'buleleng',
                'gianyar',
                'jembrana',
                'karangasem',
                'kelungkung',
                'tabanan',
                'denpasar'
            ]);
            $table->string('alamat');
            $table->text('deskripsi');
            $table->integer('like');
            $table->integer('dislike');
            $table->timestamps();
            $table->foreign('fk_id_user')->references('id')->on('users');
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
