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
use App\RejectGoods;
use App\TransferMaterials;
use App\CurrentStock;
use Response;
use DB;
use Validator;

class MaterialCurrentStockController extends Controller
{

	public function getMaterialReportBasedOnMaterialId(Request $request)
	{
		$currentStock = CurrentStock::leftJoin('vendors', 'current_stock.vendor_id', '=', 'vendors.vendor_id')
		->leftJoin('projects', 'current_stock.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'current_stock.material_id', '=', 'materials.material_id')
		->select('projects.name AS Pname', 'materials.*','vendors.name AS vname','current_stock.*')
		->get();
		return Response::json(['success' => true, 'data' => $currentStock], 200);
	}

	/*public function getMaterialReportBasedOnProjectId(Request $request, $id)
	{
		$currentStock = CurrentStock::select('current_stock.*')
		->where('project_id', $id)
		->get();
		return Response::json(['success' => true, 'data' => $currentStock], 200);
	}*/

}