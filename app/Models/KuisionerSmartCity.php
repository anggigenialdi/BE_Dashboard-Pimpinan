<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KuisionerSmartCity extends Model
{
    //
    protected $table = "kuisioner_smart_city";

    protected $fillable = [
        'id_skpd',
        'uuid',
        'iso',
        'deskripsi',
        'tahun',
        'deskripsi_tahun',
        'ketersediaan',
        'unit_penyedia_data',
        'keterangan',
    ];

    public function kebutuhanDataPendukung(){
        return $this->belongsTo(KebutuhanDataPendukung::class);
    }

}
