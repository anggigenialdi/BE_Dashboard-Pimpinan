<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KebutuhanDataPendukung extends Model
{
    //
    protected $table = "kebutuhan_data_pendukung";

    protected $fillable = [
        'id_skpd',
        'iso',
        'deskripsi',
    ];

    public function kuisioner(){
        return $this->hasMany(NilaiKuisionerSmartCity::class, 'id_kebutuhan_data_pendukung');
    }
}
