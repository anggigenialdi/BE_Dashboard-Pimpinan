<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndexSpbePertahun extends Model
{
    protected $table = "index_spbe_pertahun";

    protected $fillable = [
        'tahun',
        'hasil_index',
    ];

    public function indexSpbeTahun(){
        return $this->belongsTo(IndexSpbe::class);
    }

}
