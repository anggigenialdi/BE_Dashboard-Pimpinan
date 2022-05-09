<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KebutuhanDataPendukung;
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
            $no = 0;
            foreach ($getKuisioner as $key) {
                $no++;
                $newArr['id_skpd'] = $key->id_skpd;
                $newArr['deskripsi'] = $key->deskripsi;
                $newArr['iso'] = $key->iso;
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
        //validate incoming request 
        // $this->validate($request, [
        //     'id_skpd'  => 'required|string',
        //     'iso' => 'required|integer',
        //     'deskripsi' => 'required|string',
        // ]);
        try {
            //code...
            //Cek Duplicate data
            $duplicate = NilaiKuisionerSmartCity::where('id', $request->input('id'))->first();

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
}
