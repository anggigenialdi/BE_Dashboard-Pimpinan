<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndexSpbe extends Model
{
    protected $table = "index_spbe";

    protected $fillable = [
        'id_indikator',
        'tahun',
        'skala_nilai',
        'index_nilai',
    ];

    public function indikator(){
        return $this->belongsTo(MasterIndikatorSpbe::class);
    }

    public function indexSpbePertahun(){
        return $this->hasMany(IndexSpbePertahun::class, 'tahun');
    }

}
