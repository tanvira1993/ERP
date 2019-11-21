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

	public function getEmployerOrEmployeeList(Request $request, $id){
		$employeeList=Projects::select('projects.*')->where('employee_role',$id)->get();
		return Response::json(['success' => true, 'data' => $employeeList], 200);
	}

	public function getSingleStockReport( $id){
		$stockList['result']= CurrentStock::leftJoin('projects', 'current_stock.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'current_stock.material_id', '=', 'materials.material_id')
		->where('current_stock.project_id',$id)
		->select('projects.name AS Ename', 'projects.location AS mobile', 'projects.description AS degisnation','materials.*','current_stock.*')
		->get()
		->toArray();

		return view('reportPrint/generate',$stockList);
	}

	public function getCompanyScrapReport($id){		
		//who scrap the materical query
		/*$scrap['result']=DB::select(DB::raw("SELECT d.material_id,d.name,p.name AS Ename,SUM(e.quantity)
			FROM materials d INNER JOIN reject_goods e ON d.material_id=e.material_id
			INNER JOIN projects p ON e.project_id=p.project_id	 
			GROUP BY d.material_id,d.name,p.name"));*/

			//all scrap list company doesnt bother
			$scrap=DB::select(DB::raw("SELECT d.material_id,d.name,SUM(e.quantity) AS q
				FROM materials d INNER JOIN reject_goods e ON d.material_id=e.material_id	
				GROUP BY d.material_id,d.name"));

			$company=Projects::select('projects.*')
			->where('project_id',$id)
			->first()
			->toArray();
			$s['result']=(compact("scrap","company"));
			return view('reportPrint/scrap',$s);
			
		}

		public function getMaterialReport($id){

			$current=DB::select(DB::raw("SELECT d.material_id,d.name,SUM(e.quantity) AS q
				FROM materials d INNER JOIN current_stock e ON d.material_id=e.material_id
				WHERE e.material_id=$id GROUP BY d.material_id,d.name"));

			$consume = DB::select(DB::raw("SELECT d.material_id,d.name,SUM(e.quantity) AS q
				FROM materials d INNER JOIN consume_materials e ON d.material_id=e.material_id	
				WHERE e.material_id=$id GROUP BY d.material_id,d.name"));

			$scrap = DB::select(DB::raw("SELECT d.material_id,d.name,SUM(e.quantity) AS q
				FROM materials d INNER JOIN reject_goods e ON d.material_id=e.material_id	
				WHERE e.material_id=$id GROUP BY d.material_id,d.name"));

			$allRcv = DB::select(DB::raw("SELECT d.material_id,d.name,SUM(e.quantity) AS q
				FROM materials d INNER JOIN gr e ON d.material_id=e.material_id	
				WHERE e.material_id=$id GROUP BY d.material_id,d.name"));

			$price = DB::select(DB::raw("SELECT d.material_id,SUM(d.quantity) AS q,AVG(d.price) AS ppp, SUM(d.quantity)*AVG(d.price) AS total
				FROM gr d 
				WHERE d.material_id=$id GROUP BY d.material_id"));

			$companyStock = DB::select(DB::raw("SELECT d.material_id, d.quantity
				FROM current_stock d 
				WHERE d.material_id=$id"));

			$material['result']=(compact("current","consume","scrap","allRcv","price","companyStock"));
			
			return view('reportPrint/materialAll',$material);

		}

	}
