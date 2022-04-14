<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableIndeksSpbe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indeks_spbe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nomor_indikator');
            $table->string('nama_indikator');
            $table->float('bobot');
            $table->integer('skala_nilai')->nullable();
            $table->float('index')->nullable();
            $table->integer('tahun')->nullable();
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
        Schema::dropIfExists('indeks_spbe');
    }
}
