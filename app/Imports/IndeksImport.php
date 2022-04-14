<?php

namespace App\Imports;

use App\Models\IndeksSpbe;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IndeksImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return IndeksSpbe|null
     */
    public function model(array $row)
    {
        if( !IndeksSpbe::where('nomor_indikator', '=', $row['nomor_indikator'])->exists() ) {

            return new IndeksSpbe(
                [
                    'nomor_indikator'   => ($row['nomor_indikator']),
                    'nama_indikator'    => ($row['nama_indikator']),
                    'bobot'          => str_replace(',', '.', $row['bobot']),
                    'skala_nilai'    => ($row['skala_nilai']),
                    'index'    =>  str_replace(',', '.', $row['index']),
                    'tahun'    => ($row['tahun']),
                ]
            );
        }

    }
}
