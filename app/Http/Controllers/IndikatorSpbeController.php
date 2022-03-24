<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IndexSpbe;
use App\Models\MasterIndikatorSpbe;
use Illuminate\Http\Request;

class IndikatorSpbeController extends Controller
{


    public function addMasterIndikatorSpbe(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'nama_indikator'  => 'required|string',
            'bobot' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
        ]);

        try {

            $addMasterIndikator = new MasterIndikatorSpbe;
            $addMasterIndikator->nama_indikator = $request->input('nama_indikator');
            $addMasterIndikator->bobot = $request->input('bobot');


            //Cek Duplicate data
            $duplicate = $addMasterIndikator->where('id', $addMasterIndikator->id)->first();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                    'data' => $addMasterIndikator,
                ], 425);
            } else {
                $addMasterIndikator->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Input Data Berhasil',
                    'data' => [$addMasterIndikator],
                ], 201);
            }
        } catch (\Exception $e) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $e
            ], 409);
        }
    }

    public function getAllMasterIndikatorSpbe(Request $request)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Master Data Index SPBE',
                'data' =>  MasterIndikatorSpbe::OrderBy('id')->get(),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function addIndexSpbe(Request $request)
    {
        try {
            //validate incoming request 
            $this->validate($request, [
                'id_indikator'  => 'required|integer',
                'tahun'  => 'required|integer',
                'skala_nilai' => 'required|integer',
            ]);

            $indikatorSpbe = new IndexSpbe;
            $indikatorSpbe->id_indikator = $request->input('id_indikator');
            $indikatorSpbe->tahun = $request->input('tahun');
            $indikatorSpbe->skala_nilai = $request->input('skala_nilai');


            //Cek Duplicate data
            $duplicate = $indikatorSpbe->where('id', $indikatorSpbe->id)->first();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                    'data' => $indikatorSpbe,
                ], 425);
            } else {

                $indikatorSpbe->save();

                $getData = MasterIndikatorSpbe::where('id', $indikatorSpbe->id_indikator)->get();
                $bobot = [];

                foreach ($getData as $key) {
                    $bobot['bobot'] = $key->bobot;
                    array_push($bobot);
                };

                //rumus: ( (skala_nilai/5) * bobot)
                $dataIndex = (($indikatorSpbe->skala_nilai / 5) * $key->bobot);

                $indikatorSpbe->update([
                    'index_nilai' => $dataIndex,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Input Data Berhasil',
                    'data' => [$indikatorSpbe],
                ], 201);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th,
            ], 409);
        }
    }

    public function getDataIndikator(Request $request, $idIndikator)
    {
        try {
            $masterIndex = MasterIndikatorSpbe::where('id', $idIndikator)->get();

            $newArr = [];
            $no = 0;
            foreach ($masterIndex as $key) {
                $no++;
                $newArr['nama_indikator'] = $key->nama_indikator;
                $newArr['bobot'] = $key->bobot;

                foreach ( $key->indexSpbe as $sp ) {
                    $newArr['tahun'] = $sp->tahun;
                    $newArr['skala_nilai'] = $sp->skala_nilai;
                    $newArr['index_nilai'] = $sp->index_nilai;
                }
                array_push($newArr);
            };
            // dd($newArr);

            return response()->json([
                'success' => true,
                'message' => 'List Data Index',
                'data' => [$newArr]
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getNilaiIndex(Request $request, $tahun)
    {
        try {
            $nilaiTahun = IndexSpbe::where('tahun', $tahun)->get();
            dd($nilaiTahun);

            $totalBobot = 0;
            foreach ($nilaiTahun as $nilai) {
                $totalBobot = ($totalBobot + $nilai->bobot);
            };
            // dd($totalBobot);


            $totalIndex = 0;
            foreach ($nilaiTahun as $key) {
                $totalIndex = ($totalIndex + $key->index);
            }
            // dd($totalIndex);


            $nilaiIndex = (($totalIndex / $totalBobot) * 5);
            dd($nilaiIndex);

            $nilaiTahun->update([
                'total_bobot' => $totalBobot,
                'total_index' => $totalIndex,
                'nilai_index' => $nilaiIndex,
            ]);
            // dd($nilaiIndex);

            if (!$nilaiTahun) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Master Data Indikator Spbe',
                    'data' =>  $nilaiTahun
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getAllMasterDomain(Request $request)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Master Data Domain',
                'data' =>  MasterIndikatorSpbe::OrderBy('id', 'ASC')->paginate(5),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getAllMasterAspek(Request $request)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Master Data Aspek',
                'data' =>  MasterIndikatorSpbe::OrderBy('id', 'ASC')->paginate(5),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }
}
