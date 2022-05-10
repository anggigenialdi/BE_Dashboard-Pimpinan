<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableAppUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_role')->nullable();
            $table->bigInteger('id_skpd')->nullable();
            $table->bigInteger('id_unit_kerja')->nullable();
            $table->string('nama')->nullable();
            $table->string('nama_jabatan')->nullable();
            $table->string('nip')->nullable();
            $table->string('nik')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('telp')->nullable();
            $table->string('ttd_image')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('foto')->nullable();
            $table->string('token')->nullable();
            $table->string('token_android')->nullable();
            $table->string('android_regid')->nullable();
            $table->string('web_regid')->nullable();
            $table->integer('verifikasi_email')->nullable();
            $table->string('aktif')->nullable();
            $table->integer('cuti')->nullable();
            $table->string('dibuat_oleh')->nullable();
            $table->string('dibuat_pada')->nullable();
            $table->string('diubah_oleh')->nullable();
            $table->string('diubah_pada')->nullable();

            $table->timestamps();
        });

        Schema::table('app_user', function(Blueprint $kolom){
            $kolom->foreign('id_role')
            ->references('id')
            ->on('master_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_user');
    }
}
