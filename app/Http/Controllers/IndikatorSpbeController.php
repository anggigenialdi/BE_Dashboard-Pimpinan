<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MasterAspekSpbe;
use App\Models\MasterDomainAspekSpbe;
use App\Models\MasterDomainSpbe;
use App\Models\MasterIndikatorSpbe;
use Illuminate\Http\Request;

class IndikatorSpbeController extends Controller
{

    /**
     * @OA\Post(
     * path="/api/v1/add-master-indikator-spbe",
     * operationId="Master Indikator Spbe",
     * tags={"Master Indikator SPBE"},
     * summary="Master Indikator Spbe",
     * description="Master Indikator Spbe",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"nama_indikator", "bobot", "skala_nilai", "tahun"},
     *               @OA\Property(property="nama_indikator", type="string"),
     *               @OA\Property(property="bobot", type="float"),
     *               @OA\Property(property="skala_nilai", type="integer"),
     *               @OA\Property(property="tahun", type="integer"),
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

    public function addMasterIndikatorSpbe(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'nama_indikator'  => 'required|string',
            'bobot' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'skala_nilai' => 'required|integer',
            'tahun' => 'required|string',
        ]);

        try {

            $indikatorSpbe = new MasterIndikatorSpbe;
            $indikatorSpbe->nama_indikator = $request->input('nama_indikator');
            $indikatorSpbe->bobot = $request->input('bobot');
            $indikatorSpbe->skala_nilai = $request->input('skala_nilai');
            $indikatorSpbe->tahun = $request->input('tahun');


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

                $dataIndikator = $indikatorSpbe::where('id', $indikatorSpbe->id)->first();
                $dataIndex = ( ($dataIndikator->skala_nilai / 5) * $dataIndikator->bobot );
                $totalBobot = $indikatorSpbe::where('bobot', $indikatorSpbe->bobot )->sum("bobot");
                $totalIndex = $indikatorSpbe::where('index', $indikatorSpbe->index)->sum("index");
                $nilaiIndex = ( ($totalIndex / $totalBobot) * 5 );

                $dataIndikator->update([
                    'index' => $dataIndex,
                    'total_bobot' => $totalBobot,
                    'total_index' => $totalIndex,
                    'nilai_index' => $nilaiIndex,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Input Data Berhasil',
                    'data' => [$dataIndikator],
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
     *      path="/api/v1/get-master-domain?page=",
     *      operationId="Master Domain SPBE",
     *      tags={"Master Indikator SPBE"},
     *      summary="Get list",
     *      description="Returns",
     *      @OA\Parameter(
     *      name="?page=",
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
    public function getAllMasterDomain(Request $request)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Master Data Domain',
                'data' =>  MasterDomainSpbe::OrderBy('id', 'ASC')->paginate(5),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }
    /**
     * @OA\Get(
     *      path="/api/v1/get-master-aspek",
     *      operationId="Master Aspek SPBE",
     *      tags={"Master Indikator SPBE"},
     *      summary="Get list",
     *      description="Returns",
     *      @OA\Parameter(
     *      name="page",
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
    public function getAllMasterAspek(Request $request)
    {
        try {
            return response()->json([
                'success' => true,
                'message' => 'Master Data Aspek',
                'data' =>  MasterAspekSpbe::OrderBy('id', 'ASC')->paginate(5),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }


    public function getMasterIndikatorSpbeById(Request $request, $idIndikator)
    {
        try {
            $dataIndikator = MasterIndikatorSpbe::where('id', $idIndikator)->get();

            $resultData = [];
            $no = 0;

            foreach ($dataIndikator as $key) {
                $no++;
                $resultData['Kode Domain'] = $key->id_master_domain_spbe;
                $resultData['tahun'] = $key->tahun;
                $resultData['nilai'] = $key->nilai;
                array_push($resultData);
            }

            var_dump($resultData);
            die();


            // $findIdDomain = MasterIndikatorSpbe::where('id_master_domain_spbe')->get();
            // var_dump($findIdDomain);die();


            return response()->json([
                'success' => true,
                'message' => 'List SPBE',
                'data' =>  [
                    'data' => $resultData
                ],
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }
    /**
     * @OA\Get(
     *      path="/api/v1/get-master-indikator-spbe/{idIndikator}/{idDomainAspek}",
     *      operationId="Master Indikator SPBE",
     *      tags={"Master Indikator SPBE"},
     *      summary="Get list Indikator SPBE",
     *      description="Returns",
     *      @OA\Parameter(
     *      name="idIndikator",
     *       in="path",
     *       required=true,
     *       @OA\Schema(
     *            type="integer"
     *       )
     *    ),
     *      @OA\Parameter(
     *      name="idDomainAspek",
     *       in="path",
     *       required=true,
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
    public function getMasterIndikatorSpbe(Request $request, $idIndikator, $idDomainAspek)
    {
        try {
            $dataDomainAspek = MasterDomainAspekSpbe::where('id', $idDomainAspek)->get();
            $dataIndikator = MasterIndikatorSpbe::where('id_master_domain_aspek_spbe', $idDomainAspek)->first();

            if (!$dataIndikator) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'gagal diambil',
                        'data' => '',
                    ],
                    400
                );
            } else {
                $data = [];
                $data_da = [];
                $no = 0;

                foreach ($dataDomainAspek as $as) {
                    $no++;
                    $data['Domain 1 Kebijakan Internal SPBE'] = $as->id_master_domain_spbe;
                    $data['Aspek 1 Kebijakan Internal Tata Kelola SPBE'] = $as->id_master_aspek_spbe;
                    $data['deskripsi'] = $as->deskripsi;
                    $data['tahun'] = $dataIndikator->tahun;
                    $data['nilai'] = $dataIndikator->nilai;
                    array_push($data_da, $data);
                }
            }


            return response()->json([
                'success' => true,
                'message' => 'List SPBE',
                'data' =>  [
                    'data' => $data_da
                ],
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }
}
