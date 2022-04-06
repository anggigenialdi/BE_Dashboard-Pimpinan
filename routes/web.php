<?php

use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Application Routes
|---------------------------------- ----------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/



$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function () {
    return Str::random(32);
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');

    $router->get('users', 'AuthController@users');

    //Indikator spbe nama dan bobot
    $router->post('add-master-indikator-spbe', 'IndikatorSpbeController@addMasterIndikatorSpbe');
    $router->get('get-master-indikator-spbe', 'IndikatorSpbeController@getAllMasterIndikatorSpbe');
    $router->put('update-master-indikator-spbe/{idMaster}', 'IndikatorSpbeController@updateMasterDataIndikatorSpbeById');

    //tambah Skala Nilai
    $router->post('add-skala-nilai-spbe', 'IndikatorSpbeController@addSkalaNilaiSpbe');
    $router->get('get-index-spbe', 'IndikatorSpbeController@getIndexSpbe');
    $router->get('get-index-spbe/{tahun}', 'IndikatorSpbeController@getIndexSpbeTahun');
    $router->get('get-index-spbe-all', 'IndikatorSpbeController@getIndexSpbeAll');

    $router->put('update-index-spbe/{id}', 'IndikatorSpbeController@getUpdataSkalaNilai');


    //Index SPBE
    $router->get('get-nilai-index', 'IndikatorSpbeController@getAllNilaiIndexPertahun');
    $router->get('get-nilai-index/{tahun}', 'IndikatorSpbeController@getNilaiIndex');

    //end


    //Master Data CCTV
    $router->post('add-master-data-cctv', 'MasterDataCctvController@addMasterDataCctv');
    $router->get('get-master-data-cctv', 'MasterDataCctvController@getAllMasterDataCctv');
    $router->get('get-master-data-cctv/{idCctv}', 'MasterDataCctvController@getMasterDataCctvById');
    $router->put('update-master-data-cctv/{idCctv}', 'MasterDataCctvController@updateMasterDataCctvById');
    $router->delete('delete-master-data-cctv/{idCctv}', 'MasterDataCctvController@deleteMasterDataCctvById');
    $router->get('master-data-cctv/', 'MasterDataCctvController@cariMasterDataCctv');

    //Master Data Wifi
    $router->post('add-master-data-wifi', 'MasterDataWifiController@addMasterDataWifi');
    $router->get('get-master-data-wifi', 'MasterDataWifiController@getAllMasterDataWifi');
    $router->get('get-master-data-wifi/{idWifi}', 'MasterDataWifiController@getMasterDataWifiById');
    $router->put('update-master-data-wifi/{idWifi}', 'MasterDataWifiController@updateMasterDataWifiById');
    $router->delete('delete-master-data-wifi/{idWifi}', 'MasterDataWifiController@deleteMasterDataWifiById');
    $router->get('master-data-wifi/', 'MasterDataWifiController@cariMasterDataWifi');

    //Master Data Menara
    $router->post('add-master-data-menara-telekomunikasi', 'MasterDataMenaraTelekomunikasiController@addMasterDataMenara');
    $router->get('get-master-data-menara-telekomunikasi', 'MasterDataMenaraTelekomunikasiController@getAllMasterDataMenara');
    $router->get('get-master-data-menara-telekomunikasi/{idMenara}', 'MasterDataMenaraTelekomunikasiController@getMasterDataMenaraById');
    $router->put('update-master-data-menara-telekomunikasi/{idMenara}', 'MasterDataMenaraTelekomunikasiController@updateMasterDataMenaraById');
    $router->delete('delete-master-data-menara-telekomunikasi/{idMenara}', 'MasterDataMenaraTelekomunikasiController@deleteMasterDataMenaraById');
    $router->get('master-data-menara-telekomunikasi/', 'MasterDataMenaraTelekomunikasiController@cariMasterDataMenara');








});
