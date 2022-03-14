<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterDomainSpbe extends Model
{
    protected $table = "master_domain_spbe";

    protected $fillable = [
        'nama_domain_spbe',
        'nomor_domain_spbe',
    ];
}
