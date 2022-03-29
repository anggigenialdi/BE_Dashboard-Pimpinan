<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MasterDataCctv;
use Illuminate\Http\Request;

class MasterDataCctvController extends Controller
{
    public function addMasterDataCctv(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'lokasi'  => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            // 'vendor' => 'required|string',
            // 'dinas' => 'required|string',
        ]);

        try {

            $dataCctv = new MasterDataCctv;
            $dataCctv->lokasi = $request->input('lokasi');
            $dataCctv->latitude = $request->input('latitude');
            $dataCctv->longitude = $request->input('longitude');
            $dataCctv->status = $request->input('status');
            $dataCctv->vendor = $request->input('vendor');
            $dataCctv->dinas = $request->input('dinas');

            //Cek Duplicate data
            $duplicate = $dataCctv->where('latitude', $dataCctv->latitude)->first();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                    'data' => $dataCctv,
                ], 425);
            } else {
                $dataCctv->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Input Data Berhasil',
                    'data'    => $dataCctv,
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

    public function getAllMasterDataCctv(Request $request)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Master Data CCTV',
                'data' =>  MasterDataCctv::OrderBy('id', 'DESC'),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getMasterDataCctvById(Request $request, $idCctv)
    {
        try {
            $dataCctv = MasterDataCctv::where('id', $idCctv)->first();

            if (!$dataCctv) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Master Data CCTV',
                    'data' =>  $dataCctv
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function updateMasterDataCctvById(Request $request, $idCctv)
    {
        try {
            $updateDataCctv = MasterDataCctv::where('id',$idCctv);
        
                $updateDataCctv->update([
                    'lokasi' => request('lokasi'),
                    'latitude' => request('latitude'),
                    'longitude' => request('longitude'),
                    'status' => request('status'),
                    'vendor' => request('vendor'),
                    'dinas' => request('dinas'),
                ]);
            

            return response()->json([
                'success' => true,
                'message' => 'Input Data Berhasil',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function deleteMasterDataCctvById(Request $request, $idCctv)
    {

        try {
            $deleteDataCctv = MasterDataCctv::where('id', $idCctv)->first();

            if (!$deleteDataCctv) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                $deleteDataCctv->delete();

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
