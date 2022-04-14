<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndeksSpbe extends Model
{
    protected $table = "indeks_spbe";

    protected $fillable = [
        'nomor_indikator',
        'nama_indikator',
        'bobot',
        'skala_nilai',
        'index',
        'tahun',
    ];

}
