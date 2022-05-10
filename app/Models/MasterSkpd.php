<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterSkpd extends Model
{
    protected $table = "master_skpd";

    protected $fillable = [
        'nama',
        'id_parent',
    ];

    

}
