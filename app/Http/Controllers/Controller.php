<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //Noted: Dokumentasi open-api

    /**
     * @OA\Info(
     *   title="API Dashboard Pimpinan",
     *   version="1.0",
     *   description="",
     *   @OA\Contact(
     *     email="diskominfo@bandung.go.id",
     *     name="Developer"
     *   )
     * )
     */

    //USER

    /**
     * @OA\Post(
     * path="/api/v1/register",
     * operationId="Register",
     * tags={"Users"},
     * summary="User Register",
     * description="User Register here",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"nama","email", "password", "password_confirmation"},
     *               @OA\Property(property="nama", type="string"),
     *               @OA\Property(property="email", type="string"),
     *               @OA\Property(property="password", type="string", format="password"),
     *               @OA\Property(property="password_confirmation", type="string", format="password")
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Register Successfully",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Register Successfully",
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


    /**
     * @OA\Post(
     * path="/api/v1/login",
     * operationId="authLogin",
     * tags={"Users"},
     * summary="User Login",
     * description="Login User Here",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"email", "password"},
     *               @OA\Property(property="email", type="string"),
     *               @OA\Property(property="password", type="string", format="password"),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Login Successfully",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Login Successfully",
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


    /**
     * @OA\Get(
     *      path="/api/v1/users",
     *      operationId="Users",
     *      tags={"Users"},
     *      summary="Get list",
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
    //END USER


    //MASTER INDEX SPBE

    /**
     * @OA\Post(
     * path="/api/v1/add-master-indikator-spbe",
     * operationId="Master Indikator Spbe",
     * tags={"Master Indikator SPBE"},
     * summary="Add Master Indikator Spbe",
     * description="Master Indikator Spbe",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"nama_indikator", "bobot",},
     *               @OA\Property(property="nama_indikator", type="string"),
     *               @OA\Property(property="bobot"),
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


    /**
     * @OA\Get(
     *      path="/api/v1/get-master-indikator-spbe",
     *      operationId="Get All Data",
     *      tags={"Master Indikator SPBE"},
     *      summary="Get All Master Data Indikator SPBE",
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


    /**
     * @OA\Post(
     * path="/api/v1/add-index-spbe",
     * operationId="Add Index SPBE",
     * tags={"Master Indikator SPBE"},
     * summary="Index SPBE",
     * description="Data Index SPBE",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"id_indikator", "tahun", "skala_nilai"},
     *               @OA\Property(property="id_indikator", type="integer"),
     *               @OA\Property(property="tahun", type="string"),
     *               @OA\Property(property="skala_nilai", type="string"),
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


    //END MASTER DATA INDEX SPBE

    // MASTER DATA CCTV
    /**
     * @OA\Post(
     * path="/api/v1/add-master-data-cctv",
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
     *               @OA\Property(property="status", type="integer"),
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


    /**
     * @OA\Get(
     *      path="/api/v1/get-master-data-cctv",
     *      operationId="Master Data CCTV Get",
     *      tags={"Master Data CCTV"},
     *      summary="Get Data CCTV",
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

    /**
     * 
     * @OA\Put(
     *      path="/api/v1/update-master-data-cctv/{idCctv}",
     *      operationId="Update Master Data CCTV By Id",
     *      tags={"Master Data CCTV"},
     *      summary="Update Data CCTV BY Id",
     *      description="Returns",
     *      @OA\Parameter(
     *      name="idCctv",
     *       in="path",
     *       required=false,
     *       @OA\Schema(
     *            type="integer"
     *       )
     *    ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *          @OA\Property(property="lokasi", type="string"),
     *               @OA\Property(property="latitude", type="string"),
     *               @OA\Property(property="longitude", type="string"),
     *               @OA\Property(property="status", type="boolean"),
     *               @OA\Property(property="vendor", type="string"),
     *               @OA\Property(property="dinas", type="string"),
     *       ),
     *     ),
     *   ),
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
    //END MASTER DATA CCTV


    /**
     * @OA\Get(
     *      path="/api/v1/get-nilai-index/{tahun}",
     *      operationId="Get Nilai Index Pertahun",
     *      tags={"Master Indikator SPBE"},
     *      summary="Get Nilai Index Pertahun",
     *      description="Returns",
     *      @OA\Parameter(
     *      name="tahun",
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
}
