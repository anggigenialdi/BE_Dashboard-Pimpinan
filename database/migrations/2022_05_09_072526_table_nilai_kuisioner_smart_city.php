<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableNilaiKuisionerSmartCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_kuisioner_smart_city', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_skpd');
            $table->unsignedBigInteger('id_kuisioner')->nullable();
            $table->integer('tahun');
            $table->string('keterangan_tahun');
            $table->string('ketersediaan');
            $table->integer('unit_penyedia_data');
            $table->string('keterangan');
            $table->timestamps();
        });

        // Schema::table('nilai_kuisioner_smart_city', function(Blueprint $kolom){
        //     $kolom->foreign('id_skpd')
        //     ->references('id')
        //     ->on('master_skpd');
        // });

        Schema::table('nilai_kuisioner_smart_city', function(Blueprint $kolom){
            $kolom->foreign('id_kuisioner')
            ->references('id')
            ->on('master_kuisioner_smart_city');
        });

        // Schema::table('nilai_kuisioner_smart_city', function(Blueprint $kolom){
        //     $kolom->foreign('unit_penyedia_data')
        //     ->references('id')
        //     ->on('master_skpd');
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_kuisioner_smart_city');
    }
}
