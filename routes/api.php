<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::post('createUser', 'UserCredentialController@saveUser');
Route::post('login', 'UserCredentialController@login');
Route::post('changePass', 'UserCredentialController@changePassword');
Route::post('createProject', 'MasterDataController@saveProject');
Route::get('projectList', 'MasterDataController@getAllProjectLists');
Route::post('createMaterial', 'MasterDataController@saveMaterial');
Route::get('materialList', 'MasterDataController@getAllMaterialLists');
Route::post('createVendor', 'MasterDataController@saveVendor');
Route::post('createCustomer', 'MasterDataController@saveCustomer');
Route::get('vendorList', 'MasterDataController@getAllVendorLists');
Route::get('customerList', 'MasterDataController@getAllCustomerLists');
Route::post('createRequsition', 'RequisitionController@saveRequisition');
Route::get('requsitionList', 'RequisitionController@getAllRequisitionLists');
Route::get('requsitionListById', 'RequisitionController@getRequisitionListsById');
Route::get('userIdById', 'UserCredentialController@getUserIdById');







