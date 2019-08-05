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
	return view('requsition');
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
	return view('project_master');
});

Route::get('/projectList', function () {
	return view('projectList');
});

Route::get('/material', function () {
	return view('material_master');
});

Route::get('/materialList', function () {
	return view('materialList');
});

Route::get('login/logout', function () {
	return (String)view('logout_view');
});


