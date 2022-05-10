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
     * description="/api/v1/register",
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
     * description="/api/v1/login",
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
     * @OA\Post(
     * path="/api/v1/user-login",
     * operationId="userLogin",
     * tags={"Users"},
     * summary="User-Login",
     * description="/api/v1/user-login",
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
     *      description="/api/v1/users",
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
     * description="api/v1/add-master-indikator-spbe",
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
     *      description="/api/v1/get-master-indikator-spbe",
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
     * path="/api/v1/add-skala-nilai-spbe",
     * operationId="Add Skala Nilai SPBE",
     * tags={"Master Indikator SPBE"},
     * summary="Tambah Data Skala Nilai SPBE",
     * description="/api/v1/add-skala-nilai-spbe",
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

    /**
     * @OA\Get(
     *      path="/api/v1/get-index-spbe",
     *      operationId="Get All  Index Spbe",
     *      tags={"Master Indikator SPBE"},
     *      summary="Get Data Index Spbe",
     *      description="/api/v1/get-index-spbe",
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
     *      path="/api/v1/get-index-spbe-all",
     *      operationId="Get Data All  Index Spbe",
     *      tags={"Master Indikator SPBE"},
     *      summary="Get Data All Index Spbe",
     *      description="/api/v1/get-index-spbe-all",
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
     * @OA\Put(
     *      path="/api/v1/update-index-spbe/{id}",
     *      operationId="Update Skala Nilai",
     *      tags={"Master Indikator SPBE"},
     *      summary="Update Skala Nilai",
     *      description="/api/v1/update-index-spbe/{id}",
     *      @OA\Parameter(
     *      name="id",
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
     *          @OA\Property(property="skala_nilai", type="integer"),
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

    /**
     * @OA\Get(
     *      path="/api/v1/get-index-spbe/{tahun}",
     *      operationId="Get Index Spbe Pilih Tahun",
     *      tags={"Master Indikator SPBE"},
     *      summary="Get Index Spbe Pilih Tahun",
     *      description="/api/v1/get-index-spbe/{tahun}",
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


    /**
     * @OA\Get(
     *      path="/api/v1/get-nilai-index",
     *      operationId="Get All Data Index Pertahun",
     *      tags={"Master Indikator SPBE"},
     *      summary="Get All Data Nilai Index Pertahun",
     *      description="/api/v1/get-nilai-index",
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
     *      path="/api/v1/get-nilai-index/{tahun}",
     *      operationId="Get Nilai Index Pertahun",
     *      tags={"Master Indikator SPBE"},
     *      summary="Get Nilai Index Pertahun By Tahun",
     *      description="/api/v1/get-nilai-index/{tahun}",
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

    /**
     * @OA\Put(
     *      path="/api/v1/update-master-indikator-spbe/{idMaster}",
     *      operationId="Master Index SPBE",
     *      tags={"Master Indikator SPBE"},
     *      summary="Master Index SPBE",
     *      description="/api/v1/update-master-indikator-spbe/{idMaster}",
     *      @OA\Parameter(
     *      name="idMaster",
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
     *           @OA\Property(property="nama_indikator", type="string"),
     *           @OA\Property(property="bobot", type="string"),
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


    //END MASTER DATA INDEX SPBE

    // MASTER DATA CCTV

    /**
     * @OA\Post(
     * path="/api/v1/add-master-data-cctv",
     * operationId="Master Data CCTV",
     * tags={"Master Data CCTV"},
     * summary="Master Data Cctv",
     * description="/api/v1/add-master-data-cctv",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"lokasi","latitude", "longitude", "status",},
     *               @OA\Property(property="lokasi", type="string"),
     *               @OA\Property(property="latitude", type="string"),
     *               @OA\Property(property="longitude", type="string"),
     *               @OA\Property(property="status", type="integer"),
     *               @OA\Property(property="vendor", type="string"),
     *               @OA\Property(property="dinas", type="string"),
     *               @OA\Property(property="link_stream", type="string"),
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
     *      description="/api/v1/get-master-data-cctv",
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
     *      description="/api/v1/get-master-data-cctv/{idCctv}",
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
     * @OA\Put(
     *      path="/api/v1/update-master-data-cctv/{idCctv}",
     *      operationId="Update Master Data CCTV By Id",
     *      tags={"Master Data CCTV"},
     *      summary="Update Data CCTV BY Id",
     *      description="/api/v1/update-master-data-cctv/{idCctv}",
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
     *               @OA\Property(property="link_stream", type="string"),
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

    /**
     * @OA\Get(
     *      path="/api/v1/master-data-cctv/",
     *      operationId="Cari Master Data CCTV",
     *      tags={"Master Data CCTV"},
     *      summary="Cari Master Data CCTV",
     *      description="/api/v1/master-data-cctv/",
     *      @OA\Parameter(
     *      name="cari",
     *       in="query",
     *       required=false,
     *       @OA\Schema(
     *            type="string"
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

    //END MASTER DATA CCTV

    //MASTER DATA WIFI

    /**
     * @OA\Post(
     * path="/api/v1/add-master-data-wifi",
     * operationId="Master Data Wifi",
     * tags={"Master Data Wifi"},
     * summary="Master Data Wifi",
     * description="/api/v1/add-master-data-wifi",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"lokasi","latitude", "longitude", "status",},
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
     *      path="/api/v1/get-master-data-wifi",
     *      operationId="Master Data Wifi Get",
     *      tags={"Master Data Wifi"},
     *      summary="Get Data Wifi",
     *      description="/api/v1/get-master-data-wifi",
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
     *      path="/api/v1/get-master-data-wifi/{idWifi}",
     *      operationId="Master Data Wifi By Id",
     *      tags={"Master Data Wifi"},
     *      summary="Get Data BY Id",
     *      description="/api/v1/get-master-data-wifi/{idWifi}",
     *      @OA\Parameter(
     *      name="idWifi",
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
     * @OA\Put(
     *      path="/api/v1/update-master-data-cctv/{idWifi}",
     *      operationId="Update Master Data Wifi By Id",
     *      tags={"Master Data Wifi"},
     *      summary="Update Data Wifi BY Id",
     *      description="/api/v1/update-master-data-cctv/{idWifi}",
     *      @OA\Parameter(
     *      name="idWifi",
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

    /**
     * @OA\Get(
     *      path="/api/v1/master-data-wifi/",
     *      operationId="Cari Master Data Wifi",
     *      tags={"Master Data Wifi"},
     *      summary="Cari Master Data Wifi",
     *      description="/api/v1/master-data-wifi/",
     *      @OA\Parameter(
     *      name="cari",
     *       in="query",
     *       required=false,
     *       @OA\Schema(
     *            type="string"
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

    //END MASTER DATA WIFI

    //MASTER DATA MENARA
    
    /**
     * @OA\Post(
     * path="/api/v1/add-master-data-menara-telekomunikasi",
     * operationId="Master Data Menara Telekomunikasi",
     * tags={"Master Data Menara Telekomunikasi"},
     * summary="Master Data Menara Telekomunikasi",
     * description="/api/v1/add-master-data-menara-telekomunikasi",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"lokasi","latitude", "longitude", "status",},
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
     *      path="/api/v1/get-master-data-menara-telekomunikasi",
     *      operationId="Master Data Menara Telekomunikasi Get",
     *      tags={"Master Data Menara Telekomunikasi"},
     *      summary="Get Data Menara Telekomunikasi",
     *      description="/api/v1/get-master-data-menara-telekomunikasi",
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
     *      path="/api/v1/get-master-data-menara-telekomunikasi/{idMenara}",
     *      operationId="Master Data Menara Telekomunikasi By Id",
     *      tags={"Master Data Menara Telekomunikasi"},
     *      summary="Get Data BY Id",
     *      description="/api/v1/get-master-data-menara-telekomunikasi/{idMenara}",
     *      @OA\Parameter(
     *      name="idMenara",
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
     * @OA\Put(
     *      path="/api/v1/update-master-data-menara-telekomunikasi/{idMenara}",
     *      operationId="Update Master Data Menara Telekomunikasi By Id",
     *      tags={"Master Data Menara Telekomunikasi"},
     *      summary="Update Data Menara Telekomunikasi BY Id",
     *      description="/api/v1/update-master-data-menara-telekomunikasi/{idMenara}",
     *      @OA\Parameter(
     *      name="idMenara",
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

    /**
     * @OA\Get(
     *      path="/api/v1/master-data-menara-telekomunikasi/",
     *      operationId="Cari Master Data Menara telekomunikasi",
     *      tags={"Master Data Menara Telekomunikasi"},
     *      summary="Cari Master Data Menara telekomunikasi",
     *      description="/api/v1/master-data-menara-telekomunikasi/",
     *      @OA\Parameter(
     *      name="cari",
     *       in="query",
     *       required=false,
     *       @OA\Schema(
     *            type="string"
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

    //END MASTER DATA MENARA

    /**
     * @OA\Get(
     *      path="/api/v1/vaksin/terkini",
     *      operationId="Vaksin",
     *      tags={"Integrasi"},
     *      summary="Get Vaksin",
     *      description="/api/v1/vaksin/terkini",
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
     *      path="/api/v1/covid",
     *      operationId="Covid",
     *      tags={"Integrasi"},
     *      summary="Get Covid",
     *      description="/api/v1/covid",
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
     * path="/api/v1/master-role",
     * operationId="masterRole",
     * tags={"Master Role"},
     * summary="Add Role",
     * description="/api/v1/master-role",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"nama"},
     *               @OA\Property(property="nama", type="string"),
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
     * @OA\Post(
     * path="api/v1/kuisioner-smart-city/create",
     * operationId="smartCity",
     * tags={"Smart City"},
     * summary="Smart City",
     * description="api/v1/kuisioner-smart-city/create",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"id_skpd", "kuisioner", "iso"},
     *               @OA\Property(property="id_skpd", type="integer"),
     *               @OA\Property(property="kuisioner", type="string", format="string"),
     *               @OA\Property(property="iso", type="integer", format="integer"),
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
     * @OA\Post(
     * path="api/v1/nilai-kuisioner-smart-city/create",
     * operationId="smartCityNilai",
     * tags={"Smart City"},
     * summary="Nilai Smart City",
     * description="api/v1/nilai-kuisioner-smart-city/create",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"id_skpd", "id_kuisioner", "tahun", "keterangan_tahun", "ketersediaan", "unit_penyedia_data", "keterangan"},
     *               @OA\Property(property="id_skpd", type="integer"),
     *               @OA\Property(property="id_kuisioner", type="integer", format="integer"),
     *               @OA\Property(property="tahun", type="integer", format="integer"),
     *               @OA\Property(property="keterangan_tahun", type="integer", format="integer"),
     *               @OA\Property(property="ketersediaan", type="string", format="string"),
     *               @OA\Property(property="unit_penyedia_data", type="integer", format="integer"),
     *               @OA\Property(property="keterangan", type="string", format="string"),
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
     *      path="/api/v1/kuisioner-smart-city",
     *      operationId="getkuisioner",
     *      tags={"Smart City"},
     *      summary="Get Data Kuisioner",
     *      description="/api/v1/kuisioner-smart-city",
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
     *      path="/api/v1/nilai-kuisioner-smart-city",
     *      operationId="getnilaikuisioner",
     *      tags={"Smart City"},
     *      summary="Get Data Nilai Kuisioner",
     *      description="/api/v1/nilai-kuisioner-smart-city",
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
     *      path="/api/v1/kuisioner-smart-city/{id_skpd}",
     *      operationId="GetKuisioner",
     *      tags={"Smart City"},
     *      summary="Get by skpd",
     *      description="/api/v1/kuisioner-smart-city/{id_skpd}",
     *      @OA\Parameter(
     *      name="id_skpd",
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
     * @OA\Get(
     *      path="/api/v1/nilai-kuisioner-smart-city/{id_skpd}",
     *      operationId="GetKuisionerNilai",
     *      tags={"Smart City"},
     *      summary="Get nilai by skpd",
     *      description="/api/v1/nilai-kuisioner-smart-city/{id_skpd}",
     *      @OA\Parameter(
     *      name="id_skpd",
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
