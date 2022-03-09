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
            $table->bigInteger('id_role')->nullable();
            $table->bigInteger('id_skpd')->nullable();
            $table->bigInteger('id_unit_kerja')->nullable();
            $table->string('nama');
            $table->integer('nip')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('telpon')->nullable();
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
            $table->datetime('dibuat_pada')->nullable();
            $table->string('diubah_oleh')->nullable();
            $table->datetime('diubah_pada')->nullable();

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
        Schema::dropIfExists('app_user');
    }
}
