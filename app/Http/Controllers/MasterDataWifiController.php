<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MasterDataWifi;
use Illuminate\Http\Request;

class MasterDataWifiController extends Controller
{
    public function addMasterDataWifi(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'lokasi'  => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);
        try {
            //code...
            $dataWifi = new MasterDataWifi;
            $dataWifi->lokasi = $request->input('lokasi');
            $dataWifi->latitude = $request->input('latitude');
            $dataWifi->longitude = $request->input('longitude');
            $dataWifi->status = $request->input('status');
            $dataWifi->vendor = $request->input('vendor');
            $dataWifi->dinas = $request->input('dinas');

            //Cek Duplicate data
            $duplicate = $dataWifi->where('latitude', $dataWifi->latitude)->first();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                    'data' => $dataWifi,
                ], 425);
            } else {
                $dataWifi->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Input Data Berhasil',
                    'data'    => $dataWifi,
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

    public function getAllMasterDataWifi(Request $request)
    {
        try {
            $dataWifi = MasterDataWifi::orderBy('id', 'DESC')->get();

            return response()->json([
                'success' => true,
                'message' => 'Master Data Wifi',
                'data' =>  $dataWifi,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getMasterDataWifiById(Request $request, $idWifi)
    {
        try {
            $dataWifi = MasterDataWifi::where('id', $idWifi)->first();

            if (!$dataWifi) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Master Data Wifi',
                    'data' =>  $dataWifi
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function updateMasterDataWifiById(Request $request, $idWifi)
    {
        try {
            $updateData = MasterDataWifi::where('id', $idWifi);

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


    public function deleteMasterDataWifiById(Request $request, $idWifi)
    {

        try {
            $deleteData = MasterDataWifi::where('id', $idWifi)->first();

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


    public function cariMasterDataWifi(Request $request)
    {
        try {

            $cari = $request->cari;

            $getData = MasterDataWifi::where('lokasi', 'like', "%" . $cari . "%")->orWhere('vendor', 'like', "%" . $cari . "%")->orderBy("id", "DESC")->get();

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
