<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IndexSpbe;
use App\Models\IndexSpbePertahun;
use App\Models\MasterIndikatorSpbe;
use Illuminate\Http\Request;

use App\Imports\IndeksImport;
use App\Imports\MasterIndikatorSpbeImport;
use App\Models\IndeksSpbe;
use Maatwebsite\Excel\Facades\Excel;

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

    public function addSkalaNilaiSpbe(Request $request)
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

                //get tahun
                $newArr = [];
                $saveData = [];
                $no = 0;
                foreach ($getData as $key) {
                    $no++;
                    $newArr['nama_indikator'] = $key->nama_indikator;
                    $newArr['bobot'] = $key->bobot;

                    foreach ($key->indexSpbe as $spbe) {
                        $newArr['id_indikator'] = $spbe->id_indikator;
                        $newArr['tahun'] = $spbe->tahun;
                    }
                    array_push($saveData, $newArr);
                };

                $newData = IndexSpbe::where('tahun', $spbe->tahun)->get();

                $totalIndex = 0;
                foreach ($newData as $key) {
                    $totalIndex = ($totalIndex + $key->index_nilai);
                }

                $dataBaru = [];
                $getIdIndikator = [];

                foreach ($newData as $key) {
                    $dataBaru['id_indikator'] = $key->id_indikator;
                    array_push($getIdIndikator, $dataBaru);
                };

                $masterIndex = MasterIndikatorSpbe::whereIn('id', $getIdIndikator)->get();

                $totalBobot = 0;
                foreach ($masterIndex as $nilai) {
                    $totalBobot = ($totalBobot + $nilai->bobot);
                };

                $hasilIndex = (($totalIndex / $totalBobot) * 5);

                $saveIndexPertahun = IndexSpbePertahun::where('tahun', request('tahun'))->first();

                if ($saveIndexPertahun !== null) {
                    $saveIndexPertahun->update(['hasil_index' => $hasilIndex]);
                } else {
                    $saveIndexPertahun = IndexSpbePertahun::create([
                        'tahun' => request('tahun'),
                        'hasil_index' => $hasilIndex,
                    ]);
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Input Data Berhasil',
                    'data' => [$indikatorSpbe],
                    'data_pertahun' => $saveIndexPertahun,
                ], 201);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th,
            ], 409);
        }
    }


    public function getIndexSpbeTahun(Request $request, $tahun)
    {
        try {
            $indexSpbe = IndexSpbe::where('tahun', $tahun)->OrderBy('id', 'ASC')->get();


            if (!$indexSpbe) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Index SPBE',
                    'data' =>  $indexSpbe,
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getAllNilaiIndexPertahun(Request $request)
    {
        try {
            $dataNilai = IndexSpbePertahun::OrderBy('tahun', 'ASC')->get();

            return response()->json([
                'success' => true,
                'message' => 'Master Data Nilai Index Spbe Pertahun',
                'data' =>  $dataNilai,
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
            $nilaiTahun = IndexSpbePertahun::where('tahun', $tahun)->get();

            if (!$nilaiTahun) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Nilai Index SPBE Pertahun',
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

    public function getIndexSpbe(Request $request)
    {
        try {
            $indexSpbe = IndexSpbe::OrderBy('id', 'ASC')->get();

            $newDatas = [];

            foreach ($indexSpbe as $key) {
                $newIndex['id_indikator'] = $key->id_indikator;
                array_push($newDatas, $newIndex);
            };
            $getData = MasterIndikatorSpbe::whereIn('id', $newDatas)->get();

            $newArr = [];
            $new = [];
            foreach ($getData as $data) {
                $newArr['nama_indikator'] = $data->nama_indikator;
                $newArr['bobot'] = $data->bobot;
                foreach ($data->indexSpbe as $spbe) {
                    $newArr['id_indikator'] = $spbe->id_indikator;
                    $newArr['tahun'] = $spbe->tahun;
                    $newArr['skala_nilai'] = $spbe->skala_nilai;
                    $newArr['index_nilai'] = $spbe->index_nilai;
                }
                array_push($new, $newArr);
            };

            return response()->json([
                'success' => true,
                'message' => 'Data Index Spbe',
                'data' => $new,
            ], 200);
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
            $dataMaster =  MasterIndikatorSpbe::OrderBy('id', 'ASC')->get();

            return response()->json([
                'success' => true,
                'message' => 'Master Data Indikator Spbe',
                'data' => $dataMaster,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function updateMasterDataIndikatorSpbeById(Request $request, $idMaster)
    {

        try {
            $updateData = MasterIndikatorSpbe::where('id', $idMaster);

            $updateData->update([
                'nama_indikator' => request('nama_indikator'),
                'bobot' => request('bobot')
            ]);

            if (!$updateData) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Update Sukses',
                    'data' =>  $request->all(),
                ], 201);
            }
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
            $dataIndikator = MasterIndikatorSpbe::OrderBy('id', 'ASC')->get();

            return response()->json([
                'success' => true,
                'message' => 'Master Data Aspek',
                'data' =>  $dataIndikator,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getUpdataSkalaNilai(Request $request, $id)
    {
        try {
            $getOldData = IndexSpbe::where('id', $id)->get();

            $newArr = [];
            $saveData = [];
            $no = 0;
            foreach ($getOldData as $key) {
                $no++;
                $newArr['id'] = $key->id;
                $newArr['id_indikator'] = $key->id_indikator;
                $newArr['tahun'] = $key->tahun;
                array_push($saveData, $newArr);
            };
            $updateData = IndexSpbe::where('id', $key->id);

            $updateData->update([
                'skala_nilai' => request('skala_nilai'),
            ]);

            $getData = MasterIndikatorSpbe::where('id',   $key->id_indikator)->get();
            $bobot = [];

            foreach ($getData as $key) {
                $bobot['bobot'] = $key->bobot;
                array_push($bobot);
            };

            //rumus: ( (skala_nilai/5) * bobot)
            $dataIndex = ((request('skala_nilai') / 5) * $key->bobot);

            $updateData->update([
                'index_nilai' => $dataIndex,
            ]);

            //get tahun
            $newArr = [];
            $saveData = [];
            $no = 0;
            foreach ($getData as $key) {
                $no++;
                $newArr['nama_indikator'] = $key->nama_indikator;
                $newArr['bobot'] = $key->bobot;

                foreach ($key->indexSpbe as $spbe) {
                    $newArr['id_indikator'] = $spbe->id_indikator;
                    $newArr['tahun'] = $spbe->tahun;
                }
                array_push($saveData, $newArr);
            };

            $newData = IndexSpbe::where('tahun', $spbe->tahun)->get();

            $totalIndex = 0;
            foreach ($newData as $key) {
                $totalIndex = ($totalIndex + $key->index_nilai);
            }

            $dataBaru = [];
            $getIdIndikator = [];

            foreach ($newData as $key) {
                $dataBaru['id_indikator'] = $key->id_indikator;
                array_push($getIdIndikator, $dataBaru);
            };

            $masterIndex = MasterIndikatorSpbe::whereIn('id', $getIdIndikator)->get();

            $totalBobot = 0;
            foreach ($masterIndex as $nilai) {
                $totalBobot = ($totalBobot + $nilai->bobot);
            };

            $hasilIndex = (($totalIndex / $totalBobot) * 5);

            $saveIndexPertahun = IndexSpbePertahun::where('tahun',  $key->tahun)->first();

            if ($saveIndexPertahun !== null) {
                $saveIndexPertahun->update(['hasil_index' => $hasilIndex]);
            } else {
                $saveIndexPertahun = IndexSpbePertahun::create([
                    'tahun' => request('tahun'),
                    'hasil_index' => $hasilIndex,
                ]);
            }

            if (!$updateData) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Update Sukses',
                    'data' =>  $request->all(),
                ], 201);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getIndexSpbeAll(Request $request)
    {
        try {
            $allDataIndex = IndexSpbe::OrderBy('id', 'ASC')->get();


            return response()->json([
                'success' => true,
                'message' => 'Data Index Spbe',
                'data' => $allDataIndex,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }


    public function import(Request $request)
    {
        $this->validate($request, [
            'file'  => 'required',
        ]);

        
        Excel::import(new IndeksImport, request()->file('file'));

        $newData = IndeksSpbe::get();

        $dataTahun = [];
        $getTahun = [];
        foreach ($newData as $key) {
            $dataTahun['tahun'] = $key->tahun;
            array_push($getTahun, $dataTahun);
        };

        $newDatas = IndeksSpbe::whereIn('tahun', $getTahun)->get();

        $totalIndex = 0;
        foreach ($newDatas as $key) {
            $totalIndex = ($totalIndex + $key->index);
        }
        

        $totalBobot = 0;
        foreach ($newDatas as $key) {
            $totalBobot = ($totalBobot + $key->bobot);
        }

        $nilaiIndex = (($totalIndex / $totalBobot) * 5);
        // dd($nilaiIndex);

        $saveIndexPertahun = IndexSpbePertahun::where('tahun', $key->tahun)->first();

        if ($saveIndexPertahun !== null) {
            $saveIndexPertahun->update(['hasil_index' => $nilaiIndex]);
        } else {
            $saveIndexPertahun = IndexSpbePertahun::create([
                'tahun' => $key->tahun,
                'hasil_index' => $nilaiIndex,
            ]);
        }


        return response()->json([
            'success' => true,
            'message' => 'Import Success',
        ], 200);
    }

    public function importMasterIndikatorSpbe(Request $request)
    {
        $this->validate($request, [
            'file'  => 'required',
        ]);

        Excel::import(new MasterIndikatorSpbeImport, request()->file('file'));

        return response()->json([
            'success' => true,
            'message' => 'Import Success',
        ], 200);
    }
}
