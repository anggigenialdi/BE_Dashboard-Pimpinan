<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterKuisionerSmartCity extends Model
{
    //
    protected $table = "master_kuisioner_smart_city";

    protected $fillable = [
        'kuisioner',
        'id_skpd',
        'iso',
    ];

    public function masterSkpd(){
        return $this->belongsTo('App\Models\MasterSkpd','id_skpd', 'id');        
    }

}
