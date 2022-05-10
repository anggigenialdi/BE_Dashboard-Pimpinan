<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiKuisionerSmartCity extends Model
{
    //
    protected $table = "nilai_kuisioner_smart_city";

    protected $fillable = [
        'id_skpd',
        'id_kuisioner',
        'tahun',
        'deskripsi_tahun',
        'ketersediaan',
        'unit_penyedia_data',
        'keterangan',
    ];

    public function kebutuhanDataPendukung()
    {
        return $this->belongsTo(KebutuhanDataPendukung::class);
    }

    public function masterSkpd(){
        return $this->belongsTo('App\Models\MasterSkpd','id_skpd', 'id');        
    }

    public function masterKuisioner(){
        return $this->belongsTo('App\Models\MasterKuisionerSmartCity','id_kuisioner', 'id');        
    }
}
