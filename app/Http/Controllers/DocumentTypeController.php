<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Projects;
use App\Materials;
use App\Vendors;
use App\Customers;
use App\Requisitions;
use App\GoodReceives;
use App\ConsumeMaterials;
use App\Releases;
use App\Documents;
use Response;
use DB;
use Validator;

class DocumentTypeController extends Controller
{

	public function getAlldocumentList()
	{
		$release = Documents::select('document_types.*')->get();
		return Response::json(['success' => true, 'data' => $release], 200);
	}



}