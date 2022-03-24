<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterIndikatorSpbe extends Model
{
    protected $table = "master_indikator_spbe";

    protected $fillable = [
        'nama_indikator',
        'bobot',
    ];

    public function indexSpbe(){
        return $this->hasMany(IndexSpbe::class, 'id_indikator');
    }
}
