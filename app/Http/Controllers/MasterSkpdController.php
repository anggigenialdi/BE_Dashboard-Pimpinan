<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MasterSkpd;
use Illuminate\Http\Request;

class MasterSkpdController extends Controller
{

    public function getAllMasterSkpd(Request $request)
    {
        try {

            $skpd = MasterSkpd::orderBy('id', 'ASC')->get();
            return response()->json([
                'success' => true,
                'message' => 'Master Skpd',
                'data' =>  $skpd,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getIdMasterSkpd(Request $request, $id)
    {
        try {
            $skpd = MasterSkpd::where('id', $id)->first();

            if (!$skpd) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ada',
                ], 404);
            } else {
                return response()->json([
                    'success' => true,
                    'message' => 'Master Data Wifi',
                    'data' =>  $skpd
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
