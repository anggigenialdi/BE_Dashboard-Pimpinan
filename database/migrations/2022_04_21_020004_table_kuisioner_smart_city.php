<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableKuisionerSmartCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuisioner_smart_city', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_skpd');
            $table->string('uuid')->nullable();
            $table->integer('iso');
            $table->string('deskripsi');
            $table->integer('tahun');
            $table->string('keterangan_tahun');
            $table->string('ketersediaan');
            $table->string('unit_penyedia_data');
            $table->string('keterangan');
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
        Schema::dropIfExists('kuisioner_smart_city');
    }
}
