<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::get('/dashboard', function () {
	return view('dashboard');
});

Route::get('/requsition', function () {
	return view('requsition/requsition');
});
Route::get('/login', function () {
	return view('login');
});

Route::get('/register', function () {
	return view('register');
});

Route::get('/passwordReset', function () {
	return view('passwordReset');
});

Route::get('/project', function () {
	return view('master/project_master');
});

Route::get('/projectList', function () {
	return view('master/projectList');
});

Route::get('/material', function () {
	return view('master/material_master');
});

Route::get('/materialList', function () {
	return view('master/materialList');
});

Route::get('/vendor', function () {
	return view('master/vendor_master');
});

Route::get('/customer', function () {
	return view('master/customer_master');
});

Route::get('/customerList', function () {
	return view('master/customerList');
});

Route::get('/vendorList', function () {
	return view('master/vendorList');
});



Route::get('/goodReceive', function () {
	return view('materialMovement/goodReceive');
});

Route::get('/consumeGood', function () {
	return view('materialMovement/consumeGood');
});

Route::get('/transferGood', function () {
	return view('materialMovement/transferGood');
});

Route::get('/goodSell', function () {
	return view('sell/goodSell');
});

Route::get('/projectSell', function () {
	return view('sell/projectSell');
});

Route::get('/utilityBillPost', function () {
	return view('accounting/utilityBillPost');
});

Route::get('/bankLoan', function () {
	return view('accounting/bankLoan');
});

Route::get('/ownInvestment', function () {
	return view('accounting/ownInvestment');
});

Route::get('/advancePayment', function () {
	return view('accounting/advancePayment');
});

Route::get('/labourCost', function () {
	return view('accounting/labourCost');
});

Route::get('/rejectGood', function () {
	return view('materialMovement/rejectGood');
});


Route::get('login/logout', function () {
	return (String)view('logout_view');
});

Route::get('/requsitionList', function () {
	return view('requsition/requsitionList');
});

Route::get('/adminPasswordReset', function () {
	return view('adminPasswordReset');
});

Route::get('/release', function () {
	return view('release/release');
});

Route::get('/documentType', function () {
	return view('release/documentType');
});

Route::get('/prReleaseApproveState', function () {
	return view('release/prReleaseApproveState');
});


Route::get('/poReleaseApproveState', function () {
	return view('release/poReleaseApproveState');
});

Route::get('/prReleaseStateDetails', function () {
	return view('release/prReleaseStateDetails');
});

Route::get('/poReleaseStateDetails', function () {
	return view('release/poReleaseStateDetails');
});



Route::get('/materialInventoryReport', function () {
	return view('reports/materialInventoryReport');
});

Route::get('/projectInventoryReport', function () {
	return view('reports/projectInventoryReport');
});

Route::get('/accountingReport', function () {
	return view('reports/accountingReport');
});

Route::get('/vendorReport', function () {
	return view('reports/vendorReport');
});

Route::get('/allRequsitionList', function () {
	return view('requsition/allRequsitionList');
});

Route::get('/requsitionApproveList', function () {
	return view('requsition/requsitionApproveList');
});

Route::get('/requsitionRejectList', function () {
	return view('requsition/requsitionRejectList');
});

Route::get('/allRequsitionApproveList', function () {
	return view('requsition/allRequsitionApproveList');
});


Route::get('/allRequsitionRejectList', function () {
	return view('requsition/allRequsitionRejectList');
});


Route::get('/purchaseOrder', function () {
	return view('purchase/purchaseOrder');
});

Route::get('/purchaseOrderList', function () {
	return view('purchase/purchaseOrderList');
});

Route::get('/allPurchaseOrderList', function () {
	return view('purchase/allPurchaseOrderList');
});

Route::get('/purchaseOrderApproveList', function () {
	return view('purchase/purchaseOrderApproveList');
});

Route::get('/allPurchaseOrderApproveList', function () {
	return view('purchase/allPurchaseOrderApproveList');
});

Route::get('/purchaseOrderRejectList', function () {
	return view('purchase/purchaseOrderRejectList');
});

Route::get('/allPurchaseOrderRejectList', function () {
	return view('purchase/allPurchaseOrderRejectList');
});

