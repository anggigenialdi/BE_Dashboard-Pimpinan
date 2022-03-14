<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterAspekSpbe extends Model
{
    protected $table = "master_aspek_spbe";

    protected $fillable = [
        'nama_aspek_spbe',
        'nomor_aspek_spbe',
    ];

}
