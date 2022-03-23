<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterIndikatorSpbe extends Model
{
    protected $table = "master_indikator_spbe";

    protected $fillable = [
        'nama_indikator',
        'skala_nilai',
        'bobot',
        'index',
        'total_index',
        'nilai_index',
        'total_bobot',
        'tahun',
    ];

    public function idDomain()
    {
        return $this->belongsTo(MasterDomainSpbe::class);
    }
}
