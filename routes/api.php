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
Route::get('getAllGoodReceiveLists', 'GoodReceiveController@getAllGoodReceiveLists');
Route::get('getGoodReceiveById', 'GoodReceiveController@getGoodReceiveById');
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
Route::get('getApproverList1', 'PRApprovalController@getLevelOneApprovalList');
Route::get('getApproverList2', 'PRApprovalController@getLevelTwoApprovalList');
Route::get('getApproverList3', 'PRApprovalController@getLevelThreeApprovalList');
Route::get('getApproverList4', 'PRApprovalController@getLevelFourApprovalList');
Route::get('getPRApprovedList', 'PRApprovalController@getPRApprovedList');
Route::get('getPRApprovedListById', 'PRApprovalController@getPRApprovedListById');
Route::post('createDocumentType', 'DocumentTypeController@saveDocumentType');
Route::get('getAllDocumentLists', 'DocumentTypeController@getAlldocumentList');
Route::get('getDocumentTypeById', 'DocumentTypeController@getDocumentTypeById');
Route::post('prApprove/{id}/{id1}/{id2}/{id3}/{id4}', 'PRApprovalController@makeApprove');
Route::post('prReject/{id}/{id1}/{id2}/{id3}/{id4}', 'PRApprovalController@makeReject');
Route::get('getPrRejectListById', 'PRApprovalController@getPRRejectedListById');
Route::get('getPrAllRejectList', 'PRApprovalController@getPRRejectedList');
Route::get('purchaseOrderListById', 'PurchaseOrderController@getPurchaseOrderById');
Route::get('getPOApproverList1', 'POApprovalController@getLevelOneApprovalList');
Route::get('getPOApproverList2', 'POApprovalController@getLevelTwoApprovalList');
Route::get('getPOApproverList3', 'POApprovalController@getLevelThreeApprovalList');
Route::get('getPOApproverList4', 'POApprovalController@getLevelFourApprovalList');
Route::post('poApprove/{id}/{id1}/{id2}/{id3}/{id4}', 'POApprovalController@makeApprove');
Route::post('poReject/{id}/{id1}/{id2}/{id3}/{id4}', 'POApprovalController@makeReject');



Route::get('getPoRejectListById', 'POApprovalController@getPORejectedListById');
Route::get('getPoRejectList', 'POApprovalController@getPORejectedList');
Route::get('getPoApprovedListById', 'POApprovalController@getPOApprovedListById');
Route::get('getPoApprovedList', 'POApprovalController@getPOApprovedList');
Route::get('getPoStateInfoListById/{id}', 'POApprovalController@getPoStateInfoListById');
Route::get('materialReportBasedOnMaterial', 'MaterialCurrentStockController@getMaterialReportBasedOnMaterialId');
Route::get('materialReportBasedOnProject', 'MaterialCurrentStockController@getMaterialReportBasedOnProjectId');



Route::get('getEmployer','MasterDataController@getAllProjectListsByLeader');
Route::get('getRejectGoodsLists','RejectGoodController@getRejectGoodsLists');


Route::post('createRefund', 'RefundController@saveRefund');

Route::get('getEmployerOrEmployeeList/{id}', 'MaterialCurrentStockController@getEmployerOrEmployeeList');

Route::get ('singleStockReport/{id}', 'MaterialCurrentStockController@getSingleStockReport');

// Route::get ('stockReportGenerate/{id}', 'MaterialCurrentStockController@getSingleStockReport');

Route::get('getMaterialListByConsume','MasterDataController@getAllMaterialListsByConsume');
Route::get('getMaterialListByScrap','MasterDataController@getAllMaterialListsByScrap');



Route::delete('deleteGoodReceiveSingleHistory/{id}','GoodReceiveController@deleteGoodReceiveSingleHistory');











































































//Tanvir Portion
Route::get('getAllUserId', 'UserCredentialController@getAllUserId');
Route::post('adminResetPass', 'UserCredentialController@adminResetPassword');
Route::get('getPrStateInfoListById/{id}', 'PRApprovalController@getPrStateInfoListById');

