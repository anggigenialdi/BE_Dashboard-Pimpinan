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

        if (!IndeksSpbe::get()) {
            IndeksSpbe::where('skala_nilai', $row(['skala_nilai']))->update(
                [
                    'nomor_indikator'   => ($row['nomor_indikator']),
                    'nama_indikator'    => ($row['nama_indikator']),
                    'bobot'          => str_replace(',', '.', $row['bobot']),
                    'skala_nilai'    => ($row['skala_nilai']),
                    'index'    =>  str_replace(',', '.', $row['index']),
                    'tahun'    => ($row['tahun'])

                ]
            );
        } else {
            $duplicate = !IndeksSpbe::where( 'nomor_indikator', '=', request('nomor_indikator') )->exists();
            // $duplicate_data = !IndeksSpbe::where( 'tahun', '=',  request('tahun')  )->exists();

            if ( $duplicate   ) {
                IndeksSpbe::create(
                    [
                        'nomor_indikator'   => ($row['nomor_indikator']),
                        'nama_indikator'    => ($row['nama_indikator']),
                        'bobot'          => str_replace(',', '.', $row['bobot']),
                        'skala_nilai'    => ($row['skala_nilai']),
                        'index'    =>  str_replace(',', '.', $row['index']),
                        'tahun'    => request('tahun'),
                    ]
                );
            } 
        }

        // if (!IndeksSpbe::where('nomor_indikator', request('nomor_indikator'))->exists()) {

        //     return new IndeksSpbe(
        //         [
        //             'nomor_indikator'   => ($row['nomor_indikator']),
        //             'nama_indikator'    => ($row['nama_indikator']),
        //             'bobot'          => str_replace(',', '.', $row['bobot']),
        //             'skala_nilai'    => ($row['skala_nilai']),
        //             'index'    =>  str_replace(',', '.', $row['index']),
        //             'tahun'    => ($row['tahun']),
        //         ]
        //     );
        // }
    }
}
