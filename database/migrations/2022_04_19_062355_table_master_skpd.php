<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableMasterSkpd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_skpd_', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_parent');
            $table->string('kode_skpd');            
            $table->string('nama');            
            $table->string('alias');            
            $table->string('email');            
            $table->string('telp');            
            $table->string('faks');            
            $table->string('alamat');            
            $table->string('logo');            
            $table->string('watermark');            
            $table->string('kop_setda');            
            $table->string('aktif');            
            $table->string('dibuat_pada');            
            $table->string('dibuat_oleh');            
            $table->string('diubah_pada');            
            $table->string('diubah_oleh');            
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
        Schema::dropIfExists('master_skpd_');
    }
}
