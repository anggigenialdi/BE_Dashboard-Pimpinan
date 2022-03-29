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

$router->get('/key',function(){
    return Str::random(32);
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');

    $router->get('users', 'AuthController@users');

    //Indikator spbe
    $router->post('add-master-indikator-spbe', 'IndikatorSpbeController@addMasterIndikatorSpbe');
    $router->get('get-master-indikator-spbe', 'IndikatorSpbeController@getAllMasterIndikatorSpbe');
    $router->put('update-master-indikator-spbe/{id}', 'IndikatorSpbeController@updateMasterDataIndikatorSpbeById');


    $router->post('add-index-spbe', 'IndikatorSpbeController@addIndexSpbe');
    $router->get('get-index-spbe', 'IndikatorSpbeController@getIndexSpbe');
    $router->get('get-index-spbe/{tahun}', 'IndikatorSpbeController@getIndexSpbeTahun');

    $router->get('get-index-spbe-skala', 'IndikatorSpbeController@getSkalaNilai');
    $router->get('get-nilai-index', 'IndikatorSpbeController@getAllNilaiIndexPertahun');
    $router->get('get-nilai-index/{tahun}', 'IndikatorSpbeController@getNilaiIndex');

    //end


    //Masger Data CCTV
    $router->post('add-master-data-cctv', 'MasterDataCctvController@addMasterDataCctv');
    $router->get('get-master-data-cctv', 'MasterDataCctvController@getAllMasterDataCctv');
    $router->get('get-master-data-cctv/{idCctv}', 'MasterDataCctvController@getMasterDataCctvById');
    $router->put('update-master-data-cctv/{idCctv}', 'MasterDataCctvController@updateMasterDataCctvById');
    $router->delete('delete-master-data-cctv/{idCctv}', 'MasterDataCctvController@deleteMasterDataCctvById');




});
