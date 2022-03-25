<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IndexSpbe;
use App\Models\IndexSpbePertahun;
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

                // $indikatorSpbe->save();

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

                $getDataIn = $indikatorSpbe;
                dd($getDataIn);
                

                //total index
                $totalIndex = 0;
                foreach ($indikatorSpbe as $key) {
                    $totalIndex = ($totalIndex + $key->index_nilai);
                }

                $totalBobot = 0;
                foreach ($getData as $nilai) {
                    $totalBobot = ($totalBobot + $nilai->bobot);
                };

                $getTahun = [];
                foreach ($indikatorSpbe as $key) {
                    $getTahun['tahun'] = $key->tahun;
                    array_push($getTahun);
                };

                $hasilIndex = (($totalIndex / $totalBobot) * 5);

                $nilaiTahun = IndexSpbe::where('tahun', $getTahun)->get();

                $nilaiTahun->update([
                    'tahun' => $getTahun,
                    'hasil_index' => $hasilIndex
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Input Data Berhasil',
                    'data' => [$indikatorSpbe],
                    'index' => $nilaiTahun,
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

                foreach ($key->indexSpbe as $sp) {
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

            $totalIndex = 0;
            foreach ($nilaiTahun as $key) {
                $totalIndex = ($totalIndex + $key->index_nilai);
            }

            $getTahun = [];
            foreach ($nilaiTahun as $key) {
                $getTahun['tahun'] = $key->tahun;
                array_push($getTahun);
            };

            $newArray = [];
            $getIdIndikator = [];

            foreach ($nilaiTahun as $key) {
                $newArray['id_indikator'] = $key->id_indikator;
                array_push($getIdIndikator, $newArray);
            };

            $masterIndex = MasterIndikatorSpbe::whereIn('id', $getIdIndikator)->get();

            $totalBobot = 0;
            foreach ($masterIndex as $nilai) {
                $totalBobot = ($totalBobot + $nilai->bobot);
            };

            $hasilIndex = (($totalIndex / $totalBobot) * 5);

            $saveIndexPertahun = new IndexSpbePertahun;
            $saveIndexPertahun->tahun = $getTahun;
            $saveIndexPertahun->hasil_index = $hasilIndex;
            dd($saveIndexPertahun);
            $saveIndexPertahun->save();

            if (!$saveIndexPertahun) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Nilai Index SPBE Pertahun',
                    'data' =>  $saveIndexPertahun
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
