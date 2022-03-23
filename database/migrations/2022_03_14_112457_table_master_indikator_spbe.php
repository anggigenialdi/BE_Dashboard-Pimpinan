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
            $table->unsignedBigInteger('id_master_domain_spbe');
            $table->unsignedBigInteger('id_master_aspek_spbe');
            $table->unsignedBigInteger('id_master_domain_aspek_spbe');
            $table->integer('tahun');
            $table->integer('skala_nilai');
            $table->float('bobot');
            $table->float('index');
            $table->float('total_index');
            $table->float('nilai_index');
            $table->integer('total_bobot');
            $table->timestamps();
        });

        Schema::table('master_indikator_spbe', function(Blueprint $kolom){
            $kolom->foreign('id_master_domain_spbe')
            ->references('id')
            ->on('master_domain_spbe');
        });
        
        Schema::table('master_indikator_spbe', function(Blueprint $kolom){
            $kolom->foreign('id_master_aspek_spbe')
            ->references('id')
            ->on('master_aspek_spbe');
        });

        Schema::table('master_indikator_spbe', function(Blueprint $kolom){
            $kolom->foreign('id_master_domain_aspek_spbe')
            ->references('id')
            ->on('master_domain_aspek_spbe');
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
