<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterIndikatorSpbe extends Model
{
    protected $table = "master_indikator_spbe";

    protected $fillable = [
        'id_master_domain_spbe',
        'id_master_aspek_spbe',
        'id_master_domain_aspek_spbe',
        'tahun',
        'nilai'
    ];

    public function idDomain(){
        return $this->belongsTo(MasterDomainSpbe::class);
    }

}
