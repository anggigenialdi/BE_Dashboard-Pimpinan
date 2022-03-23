<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableMasterIndikatorSpbe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_indikator_spbe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_indikator');
            $table->integer('skala_nilai');
            $table->float('bobot');
            $table->float('index')->nullable();
            $table->float('total_index')->nullable();
            $table->float('nilai_index')->nullable();
            $table->float('total_bobot')->nullable();
            $table->integer('tahun');
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
        Schema::dropIfExists('master_indikator_spbe');
    }
}
