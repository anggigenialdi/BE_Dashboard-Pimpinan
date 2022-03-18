<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MasterDataCctv;
use Illuminate\Http\Request;

class MasterDataCctvController extends Controller
{
    /**
     * @OA\Post(
     * path="/api/v1/add-master-cctv",
     * operationId="Master Data CCTV",
     * tags={"Master Data CCTV"},
     * summary="Master Data Cctv",
     * description="Master Data Cctv",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"lokasi","latitude", "longitude", "status", "vendor", "dinas"},
     *               @OA\Property(property="lokasi", type="string"),
     *               @OA\Property(property="latitude", type="string"),
     *               @OA\Property(property="longitude", type="string"),
     *               @OA\Property(property="status", type="string"),
     *               @OA\Property(property="vendor", type="string"),
     *               @OA\Property(property="dinas", type="string"),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Input Data Successfully",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Input Data Successfully",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */

    public function addMasterDataCctv(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'lokasi'  => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            // 'status' => 'required|string',
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
            $duplicateLongitude = $dataCctv->where('longitude', $dataCctv->longitude)->first();

            if ($duplicate || $duplicateLongitude) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                    'data' => $dataCctv,
                ], 425);
            } else if ($duplicate && $duplicateLongitude) {
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

    /**
     * @OA\Get(
     *      path="/api/v1/get-master-data-cctv",
     *      operationId="Master Data CCTV Get",
     *      tags={"Master Data CCTV"},
     *      summary="Get list GET ALL",
     *      description="Returns",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function getAllMasterDataCctv(Request $request)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Master Data CCTV',
                'data' =>  MasterDataCctv::OrderBy('id', 'ASC')->paginate(5),
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);        }
    }

    /**
     * @OA\Get(
     *      path="/api/v1/get-master-data-cctv/{idCctv}",
     *      operationId="Master Data CCTV By Id",
     *      tags={"Master Data CCTV"},
     *      summary="Get Data BY Id",
     *      description="Returns",
     *      @OA\Parameter(
     *      name="idCctv",
     *       in="path",
     *       required=false,
     *       @OA\Schema(
     *            type="integer"
     *       )
     *    ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function getMasterDataCctvById(Request $request, $idCctv)
    {
        try {
            $dataCctv = MasterDataCctv::where('id', $idCctv)->first();

            if (!$dataCctv){
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
            ], 409);        }
    }
}
