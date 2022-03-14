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
     * path="/api/v1/add-master-domain-spbe",
     * operationId="Master Domain Spbe",
     * tags={"Master Indikator SPBE"},
     * summary="Master Domain Spbe",
     * description="Master Domain Spbe",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"nama_domain_spbe","nomor_domain_spbe",},
     *               @OA\Property(property="nama_domain_spbe", type="string"),
     *               @OA\Property(property="nomor_domain_spbe", type="integer"),
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

    public function addMasterDomainSpbe(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'nama_domain_spbe'  => 'required|string',
            'nomor_domain_spbe' => 'required|integer',
        ]);

        try {

            $domain = new MasterDomainSpbe;
            $domain->nama_domain_spbe = $request->input('nama_domain_spbe');
            $domain->nomor_domain_spbe = $request->input('nomor_domain_spbe');
            $domain->save();

            return response()->json([
                'success' => true,
                'message' => 'Input Data Berhasil',
                'data'    => $domain,
            ], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $e
            ], 409);
        }
    }

    /**
     * @OA\Post(
     * path="/api/v1/add-master-aspek-spbe",
     * operationId="Master Aspek Spbe",
     * tags={"Master Indikator SPBE"},
     * summary="Master Aspek Spbe",
     * description="Master Aspek Spbe",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"nama_aspek_spbe","nomor_aspek_spbe",},
     *               @OA\Property(property="nama_aspek_spbe", type="string"),
     *               @OA\Property(property="nomor_aspek_spbe", type="integer"),
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

    public function addMasterAspekSpbe(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'nama_aspek_spbe'  => 'required|string',
            'nomor_aspek_spbe' => 'required|integer',
        ]);

        try {

            $aspek = new MasterAspekSpbe;
            $aspek->nama_aspek_spbe = $request->input('nama_aspek_spbe');
            $aspek->nomor_aspek_spbe = $request->input('nomor_aspek_spbe');

            //Cek Duplicate data
            $duplicate = $aspek->where('nomor_aspek_spbe', $aspek->nomor_aspek_spbe)->first();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                    'data' => $aspek,
                ], 425);
            } else {
                $aspek->save();
            }
            return response()->json([
                'success' => true,
                'message' => 'Input Data Berhasil',
                'data' => $aspek,
            ], 201);
        } catch (\Exception $e) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $e
            ], 409);
        }
    }
    /**
     * @OA\Post(
     * path="/api/v1/add-master-domain-aspek-spbe",
     * operationId="Master Domain Aspek Spbe",
     * tags={"Master Indikator SPBE"},
     * summary="Master Domain Aspek Spbe",
     * description="Master Domain Aspek Spbe",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"id_master_domain_spbe","id_master_aspek_spbe", "deskripsi"},
     *               @OA\Property(property="id_master_domain_spbe", type="integer"),
     *               @OA\Property(property="id_master_aspek_spbe", type="integer"),
     *               @OA\Property(property="deskripsi", type="string"),
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

    public function addMasterDomainAspekSpbe(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'id_master_domain_spbe'  => 'required|integer',
            'id_master_aspek_spbe' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        try {

            $domainAspek = new MasterDomainAspekSpbe;
            $domainAspek->id_master_domain_spbe = $request->input('id_master_domain_spbe');
            $domainAspek->id_master_aspek_spbe = $request->input('id_master_aspek_spbe');
            $domainAspek->deskripsi = $request->input('deskripsi');

            //Cek Duplicate data
            $duplicate = $domainAspek->where('deskripsi', $domainAspek->deskripsi)->first();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                    'data' => $domainAspek,
                ], 425);
            } else {
                $domainAspek->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Input Data Berhasil',
                    'data' => $domainAspek,
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
     *               required={"id_master_domain_spbe","id_master_aspek_spbe", "id_master_domain_aspek_spbe", "tahun", "nilai"},
     *               @OA\Property(property="id_master_domain_spbe", type="integer"),
     *               @OA\Property(property="id_master_aspek_spbe", type="integer"),
     *               @OA\Property(property="id_master_domain_aspek_spbe", type="integer"),
     *               @OA\Property(property="tahun", type="string"),
     *               @OA\Property(property="nilai", type="string"),
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
            'id_master_domain_spbe'  => 'required|integer',
            'id_master_aspek_spbe' => 'required|integer',
            'id_master_domain_aspek_spbe' => 'required|integer',
            'tahun' => 'required|string',
            'nilai' => 'required|string',
        ]);

        try {

            $indikatorSpbe = new MasterIndikatorSpbe;
            $indikatorSpbe->id_master_domain_spbe = $request->input('id_master_domain_spbe');
            $indikatorSpbe->id_master_aspek_spbe = $request->input('id_master_aspek_spbe');
            $indikatorSpbe->id_master_domain_aspek_spbe = $request->input('id_master_domain_aspek_spbe');
            $indikatorSpbe->tahun = $request->input('tahun');
            $indikatorSpbe->nilai = $request->input('nilai');

            //Cek Duplicate data
            $duplicate = $indikatorSpbe->where('tahun', $indikatorSpbe->tahun)->first();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                    'data' => $indikatorSpbe,
                ], 425);
            } else {
                $indikatorSpbe->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Input Data Berhasil',
                    'data' => $indikatorSpbe,
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
}
