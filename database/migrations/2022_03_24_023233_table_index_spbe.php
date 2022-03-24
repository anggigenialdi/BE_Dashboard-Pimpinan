<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableIndexSpbe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index_spbe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_indikator');
            $table->integer('tahun')->nullable();
            $table->integer('skala_nilai')->nullable();
            $table->float('index_nilai')->nullable();
            $table->timestamps();
        });

        Schema::table('index_spbe', function(Blueprint $kolom){
            $kolom->foreign('id_indikator')
            ->references('id')
            ->on('master_indikator_spbe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('index_spbe');
    }
}
