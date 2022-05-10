<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableMasterKuisionerSmartCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_kuisioner_smart_city', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kuisioner');
            $table->integer('iso');
            $table->integer('id_skpd');
            $table->timestamps();
        });

        // Schema::table('master_kuisioner_smart_city', function(Blueprint $kolom){
        //     $kolom->foreign('id_skpd')
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
        Schema::dropIfExists('master_kuisioner_smart_city');
    }
}
