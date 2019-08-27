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

Route::get('/purchaseOrder', function () {
	return view('purchaseOrder');
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

