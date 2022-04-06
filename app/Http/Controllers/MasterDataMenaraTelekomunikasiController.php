<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MasterDataMenaraTelekomunikasi;
use Illuminate\Http\Request;

class MasterDataMenaraTelekomunikasiController extends Controller
{
    public function addMasterDataMenara(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'lokasi'  => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);
        try {
            //code...
            $dataMenara = new MasterDataMenaraTelekomunikasi;
            $dataMenara->lokasi = $request->input('lokasi');
            $dataMenara->latitude = $request->input('latitude');
            $dataMenara->longitude = $request->input('longitude');
            $dataMenara->status = $request->input('status');
            $dataMenara->vendor = $request->input('vendor');
            $dataMenara->dinas = $request->input('dinas');

            //Cek Duplicate data
            $duplicate = $dataMenara->where('latitude', $dataMenara->latitude)->first();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                    'data' => $dataMenara,
                ], 425);
            } else {
                $dataMenara->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Input Data Berhasil',
                    'data'    => $dataMenara,
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

    public function getAllMasterDataMenara(Request $request)
    {
        try {
            $dataMenara = MasterDataMenaraTelekomunikasi::orderBy('id', 'DESC')->get();

            return response()->json([
                'success' => true,
                'message' => 'Master Data Wifi',
                'data' =>  $dataMenara,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }


    public function getMasterDataMenaraById(Request $request, $idMenara)
    {
        try {
            $dataMenara = MasterDataMenaraTelekomunikasi::where('id', $idMenara)->first();

            if (!$dataMenara) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Master Data Menara Telekomunikasi',
                    'data' =>  $dataMenara
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function updateMasterDataMenaraById(Request $request, $idMenara)
    {
        try {
            $updateData = MasterDataMenaraTelekomunikasi::where('id', $idMenara);

            $updateData->update([
                'lokasi' => request('lokasi'),
                'latitude' => request('latitude'),
                'longitude' => request('longitude'),
                'status' => request('status'),
                'vendor' => request('vendor'),
                'dinas' => request('dinas'),
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

    public function deleteMasterDataMenaraById(Request $request, $idMenara)
    {

        try {
            $deleteData = MasterDataMenaraTelekomunikasi::where('id', $idMenara)->first();

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


    public function cariMasterDataMenara(Request $request)
    {
        try {

            $cari = $request->cari;

            $getData = MasterDataMenaraTelekomunikasi::where('lokasi', 'like', "%" . $cari . "%")->orWhere('vendor', 'like', "%" . $cari . "%")->orderBy("id", "DESC")->get();

            return response()->json([
                'success' => true,
                'message' => 'Hasil Cari',
                'data' =>  $getData,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }
}
