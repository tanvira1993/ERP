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
Route::post('createPurchaseOrder', 'PurchaseOrderController@savePurchaseOrder');
Route::get('getAllPurchaseOrderLists', 'PurchaseOrderController@getAllPurchaseOrderLists');
Route::get('getPurchaseOrderById', 'PurchaseOrderController@getPurchaseOrderById');
Route::post('createGoodReceive', 'GoodReceiveController@saveGoodReceive');
Route::get('getAllGoodReceiveLists', 'PurchaseOrderController@getAllGoodReceiveLists');
Route::get('getGoodReceiveById', 'PurchaseOrderController@getGoodReceiveById');
Route::post('createConsumeGood', 'ConsumeGoodController@saveConsumeGood');
Route::get('getAllConsumeGoodLists', 'ConsumeGoodController@getAllConsumeGoodLists');
Route::get('getConsumeGoodById', 'ConsumeGoodController@getConsumeGoodById');
Route::post('createTransferGood', 'TransferGoodController@saveTransferGood');
Route::get('getAllTransferGoodLists', 'TransferGoodController@getAllTransferGoodLists');
Route::get('getTransferGoodById', 'TransferGoodController@getTransferGoodById');
Route::post('createRejectGood', 'RejectGoodController@saveRejectGood');
Route::get('getRejectGoodLists', 'RejectGoodController@getRejectGoodLists');
Route::get('getRejectGoodById', 'RejectGoodController@getRejectGoodById');
Route::post('createUtilityBillPost', 'UtilityBillPostController@saveUtilityBillPost');
Route::get('getUtilityBillPostLists', 'UtilityBillPostController@getUtilityBillPostLists');
Route::get('getUtilityBillPostById', 'UtilityBillPostController@getUtilityBillPostById');
Route::post('createBankLoan', 'BankLoanController@saveBankLoan');
Route::get('getBankLoanLists', 'BankLoanController@getBankLoanLists');
Route::get('getBankLoanById', 'BankLoanController@getBankLoanById');
Route::post('createOwnInvestment', 'OwnInvestmentController@saveOwnInvestment');
Route::get('getOwnInvestmentLists', 'OwnInvestmentController@getOwnInvestmentLists');
Route::get('getOwnInvestmentById', 'OwnInvestmentController@getOwnInvestmentById');
Route::post('createAdvancePayment', 'AdvancePaymentController@saveAdvancePayment');
Route::get('getAdvancePaymentLists', 'AdvancePaymentController@getAdvancePaymentLists');
Route::get('getAdvancePaymentById', 'AdvancePaymentController@getAdvancePaymentById');
Route::post('createLabourCost', 'LabourCostController@saveLabourCost');
Route::get('getLabourCostLists', 'LabourCostController@getLabourCostLists');
Route::get('getLabourCostById', 'LabourCostController@getLabourCostById');
Route::post('createGoodSell', 'GoodSellController@saveGoodSell');
Route::get('getGoodSellLists', 'GoodSellController@getGoodSellLists');
Route::get('getGoodSellById', 'GoodSellController@getGoodSellById');
Route::post('createProjectSell', 'ProjectSellController@saveProjectSell');
Route::get('getProjectSellLists', 'ProjectSellController@getProjectSellLists');
Route::get('getProjectSellById', 'ProjectSellController@getProjectSellById');
Route::get('getAlldocumentList', 'DocumentTypeController@getAlldocumentList');
Route::post('createRelease', 'ReleaseController@saveRelease');
Route::get('getApproverList1', 'ApprovalController@getLevelOneApprovalList');
Route::get('getApproverList2', 'ApprovalController@getLevelTwoApprovalList');
Route::get('getApproverList3', 'ApprovalController@getLevelThreeApprovalList');
Route::get('getApproverList4', 'ApprovalController@getLevelFourApprovalList');
Route::get('getPRApprovedList', 'ApprovalController@getPRApprovedList');
Route::get('getPRApprovedListById', 'ApprovalController@getPRApprovedListById');
Route::post('createDocumentType', 'DocumentTypeController@saveDocumentType');
Route::get('getAllDocumentLists', 'DocumentTypeController@getAlldocumentList');
Route::get('getDocumentTypeById', 'DocumentTypeController@getDocumentTypeById');

































































































//Tanvir Portion
Route::get('getAllUserId', 'UserCredentialController@getAllUserId');
Route::post('adminResetPass', 'UserCredentialController@adminResetPassword');
