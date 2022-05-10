<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KebutuhanDataPendukung;
use App\Models\MasterKuisionerSmartCity;
use App\Models\NilaiKuisionerSmartCity;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class MasterSmartCityController extends Controller
{
    public function addKebutuhanDataPendukung(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'id_skpd'  => 'required|string',
            'iso' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);
        try {
            //code...
            //Cek Duplicate data
            $duplicate = NilaiKuisionerSmartCity::where('tahun', $request->input('tahun'))->first();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                ], 425);
            } else {


                $masterData = new NilaiKuisionerSmartCity;
                $masterData->id_skpd = $request->input('id_skpd');
                $masterData->iso = $request->input('iso');
                $masterData->deskripsi = $request->input('deskripsi');
                $masterData->tahun = $request->input('tahun');
                $masterData->keterangan_tahun = $request->input('keterangan_tahun');
                $masterData->ketersediaan = $request->input('ketersediaan');
                $masterData->unit_penyedia_data = $request->input('unit_penyedia_data');
                $masterData->keterangan = $request->input('keterangan');
                // $masterData->uuid = Uuid::uuid4()->getHex();

                // dd($masterData);

                $masterData->save();


                return response()->json([
                    'success' => true,
                    'message' => 'Input Data Berhasil',
                    'data'    => $masterData,
                ], 201);
            }
        } catch (\Throwable $th) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getAllKebutuhanDataPendukung(Request $request)
    {
        try {
            $getData = KebutuhanDataPendukung::orderBy('id', 'DESC')->get();

            return response()->json([
                'success' => true,
                'message' => 'Kebutuhan Data Pendukung',
                'data' =>  $getData,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getByIdKebutuhanDataPendukung(Request $request, $id)
    {
        try {
            $dataKebutuhan = KebutuhanDataPendukung::where('id', $id)->first();

            if (!$dataKebutuhan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Master Data Wifi',
                    'data' =>  $dataKebutuhan
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function updatedKebutuhanDataPendukung(Request $request, $id)
    {

        try {
            $updateData = KebutuhanDataPendukung::where('id', $id);

            $updateDatas = KebutuhanDataPendukung::where('id', $id)->get();

            $simpanData = [];

            foreach ($updateDatas as $key) {
                $simpanData['iso'] = $key->iso;
                $simpanData['deskripsi'] = $key->deskripsi;
                array_push($simpanData);
            };
            // dd($deskripsi);

            $updateData->update([
                'id_skpd' => request('id_skpd'),
                'iso' => request('iso') ?? $key->iso,
                'deskripsi' => request('deskripsi') ?? $key->deskripsi,
            ]);


            return response()->json([
                'success' => true,
                'message' => 'Updata Data Berhasil',
                'data' =>  $request->all(),
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function deleteKebutuhanDataPendukung(Request $request, $id)
    {

        try {
            $deleteData = KebutuhanDataPendukung::where('id', $id)->first();

            if (!$deleteData) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                $deleteData->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'Data terhapus',
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getAllNilaiKuisionerSmartCity(Request $request)
    {
        try {
            $getKuisioner = NilaiKuisionerSmartCity::get();

            $newArr = [];
            $saveData = [];
            $no = 1;
            foreach ($getKuisioner as $key) {

                $newArr['no'] = $no++;
                $newArr['id_skpd'] = $key->masterSkpd->nama;
                $newArr['id_kuisioner'] = $key->masterKuisioner->kuisioner;
                $newArr['tahun'] = $key->tahun;
                $newArr['keterangan_tahun'] = $key->keterangan_tahun;
                $newArr['ketersediaan'] = $key->ketersediaan;
                $newArr['unit_penyedia_data'] = $key->unit_penyedia_data;
                $newArr['keterangan'] = $key->keterangan;
                array_push($saveData, $newArr);
            };
            // dd($saveData);



            return response()->json([
                'success' => true,
                'message' => 'Kuisioner',
                'data' =>  $saveData,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function addNilaiKuisionerSmartCity(Request $request)
    {

        try {

            $masterData = new NilaiKuisionerSmartCity;
            $masterData->id_kuisioner = $request->input('id_kuisioner');
            $masterData->id_skpd = $request->input('id_skpd');
            $masterData->tahun = $request->input('tahun');
            $masterData->keterangan_tahun = $request->input('keterangan_tahun');
            $masterData->ketersediaan = $request->input('ketersediaan');
            $masterData->unit_penyedia_data = $request->input('unit_penyedia_data');
            $masterData->keterangan = $request->input('keterangan');

            // dd($masterData);

            $masterData->save();


            return response()->json([
                'success' => true,
                'message' => 'Input Data Berhasil',
                'data'    => $masterData,
            ], 201);
        } catch (\Throwable $th) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function addMasterKuisionerSmartCity(Request $request)
    {
        try {
            //code...
            //Cek Duplicate data
            $duplicate = MasterKuisionerSmartCity::where('iso', $request->input('iso'))->first();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                ], 425);
            } else {

                $masterData = new MasterKuisionerSmartCity;
                $masterData->kuisioner = $request->input('kuisioner');
                $masterData->id_skpd = $request->input('id_skpd');
                $masterData->iso = $request->input('iso');

                // dd($masterData);

                $masterData->save();


                return response()->json([
                    'success' => true,
                    'message' => 'Input Data Berhasil',
                    'data'    => $masterData,
                ], 201);
            }
        } catch (\Throwable $th) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }


    public function getAllMasterKuisionerSmartCity(Request $request)
    {
        try {

            $dataKuisioner = MasterKuisionerSmartCity::get();

            $newArr = [];
            $saveData = [];
            $no = 1;
            foreach ($dataKuisioner as $key) {
                $newArr['no'] = $no++;
                $newArr['id_skpd'] = $key->id_skpd;
                $newArr['kuisioner'] = $key->kuisioner;
                $newArr['iso'] = $key->iso;
                $newArr['skpd'] = $key->masterSkpd->nama;

                array_push($saveData, $newArr);
            };

            if (!$dataKuisioner) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Master Data Kuisioner Smart City',
                    'data' =>  $saveData
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }
    public function getIdMasterKuisionerSmartCity(Request $request, $id_skpd)
    {
        try {

            $dataKuisioner = MasterKuisionerSmartCity::where('id_skpd', $id_skpd)->get();


            if (!$dataKuisioner) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Master Data Kuisioner Smart City By SKPD',
                    'data' =>  $dataKuisioner
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function updateMasterKuisionerSmartCity(Request $request, $id)
    {

        try {
            $updateData = MasterKuisionerSmartCity::where('id', $id);

            $updateDatas = MasterKuisionerSmartCity::where('id', $id)->get();

            $simpanData = [];

            foreach ($updateDatas as $key) {
                $simpanData['id_skpd'] = $key->id_skpd;
                $simpanData['iso'] = $key->iso;
                $simpanData['kuisioner'] = $key->kuisioner;
                array_push($simpanData);
            };

            $updateData->update([
                'id_skpd' => request('id_skpd') ?? $key->id_skpd,
                'iso' => request('iso') ?? $key->iso,
                'kuisioner' => request('kuisioner') ?? $key->kuisioner,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Updata Data Berhasil',
                'data' =>  $request->all(),
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getIdNilaiKuisionerSmartCity(Request $request, $id_skpd)
    {
        try {

            $dataNilai = NilaiKuisionerSmartCity::where('id_skpd', $id_skpd)->get();

            $newArr = [];
            $saveData = [];
            $no = 1;
            foreach ($dataNilai as $key) {
                $newArr['no'] = $no++;
                $newArr['id_skpd'] = $key->masterSkpd->id;
                $newArr['skpd'] = $key->masterSkpd->nama;
                $newArr['kuisioner'] = $key->masterKuisioner->kuisioner;
                $newArr['iso'] = $key->masterKuisioner->iso;
                $newArr['tahun'] = $key->tahun;
                $newArr['keterangan_tahun'] = $key->keterangan_tahun;
                $newArr['ketersediaan'] = $key->ketersediaan ;
                $newArr['unit_penyedia_data'] = $key->masterSkpd->nama;
                $newArr['keterangan'] = $key->keterangan;

                array_push($saveData, $newArr);
            };

            if (!$dataNilai) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Master Data Nilai Kuisioner Smart City',
                    'data' =>  $saveData
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function updateNilaiKuisionerSmartCity(Request $request, $id)
    {

        try {
            $updateData = NilaiKuisionerSmartCity::where('id', $id);

            $updateDatas = NilaiKuisionerSmartCity::where('id', $id)->get();

            $simpanData = [];

            foreach ($updateDatas as $key) {
                $simpanData['id_skpd'] = $key->id_skpd;
                $simpanData['id_kuisioner'] = $key->id_kuisioner;
                $simpanData['tahun'] = $key->tahun;
                $simpanData['keterangan_tahun'] = $key->keterangan_tahun;
                $simpanData['ketersediaan'] = $key->ketersediaan;
                $simpanData['unit_penyedia_date'] = $key->unit_penyedia_date;
                $simpanData['keterangan'] = $key->keterangan;
                array_push($simpanData);
            };

            $updateData->update([
                'id_skpd' => request('id_skpd') ?? $key->id_skpd,
                'id_kuisioner' => request('id_kuisioner') ?? $key->id_kuisioner,
                'tahun' => request('tahun') ?? $key->tahun,
                'keterangan_tahun' => request('keterangan_tahun') ?? $key->keterangan_tahun,
                'ketersediaan' => request('ketersediaan') ?? $key->ketersediaan,
                'unit_penyedia_data' => request('unit_penyedia_data') ?? $key->unit_penyedia_data,
                'keterangan' => request('keterangan') ?? $key->keterangan,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Updata Data Berhasil',
                'data' =>  $request->all(),
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function deleteMasterKuisionerSmartCity(Request $request, $id)
    {

        try {
            $deleteData = MasterKuisionerSmartCity::where('id', $id)->first();

            if (!$deleteData) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                $deleteData->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'Data terhapus',
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }
}
