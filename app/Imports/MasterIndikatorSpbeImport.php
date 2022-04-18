<?php

namespace App\Imports;

use App\Models\MasterIndikatorSpbe;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MasterIndikatorSpbeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return MasterIndikatorSpbe|null
     */
    public function model(array $row)
    {
        if( !MasterIndikatorSpbe::where('nama_indikator', '=', $row['nama_indikator'])->exists() ) {

            return new MasterIndikatorSpbe(
                [
                    'nama_indikator'    => ($row['nama_indikator']),
                    'bobot'          => str_replace(',', '.', $row['bobot']),
                ]
            );
        }

    }
}
