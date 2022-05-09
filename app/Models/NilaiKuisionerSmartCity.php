<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiKuisionerSmartCity extends Model
{
    //
    protected $table = "nilai_kuisioner_smart_city";

    protected $fillable = [
        'id_skpd',
        'deskripsi',
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
}
