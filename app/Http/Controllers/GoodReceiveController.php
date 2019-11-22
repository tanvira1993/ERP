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
use App\CurrentStock;
use Response;
use DB;
use Validator;

class GoodReceiveController extends Controller
{
	public function saveGoodReceive (Request $request)
	{
		

		$rules = [
			'idProject' => 'required |numeric',
			'idMaterial' => 'required |numeric',
			'idVendor' => 'required | numeric',
			'quantity' => 'required |numeric',
			'price' => 'required |numeric',
		];

		$messages = [
			'idProject.required' => 'Project is required!',
			'idMaterial.required' => 'Material is required!',
			'idVendor.required' => 'Vendor is required!',			
			'quantity.required' => 'Quantity is required!',
			'price.required' => 'Price is required!',	

		];

		$validation = Validator::make($request->all(), $rules, $messages);

        // redirect on validation error
		if ($validation->fails()) {
			$errorMsgString = implode("<br/>",$validation->messages()->all());
			return Response::json(array('success' => false, 'heading' => 'Validation Error', 'message' => $errorMsgString), 400);
		}

		DB::beginTransaction();

		try {
			$id=$request->header('idUser');

			$goodReceive = new GoodReceives;
			$goodReceive->project_id = $request->idProject;
			$goodReceive->material_id = $request->idMaterial;
			$goodReceive->vendor_id = $request->idVendor;
			$goodReceive->quantity = $request->quantity;
			$goodReceive->price = $request->price;
			$goodReceive->user_id = $id;

			$stockDataS=CurrentStock::select('current_stock.*')
			->where('project_id',$request->idProject)
			->where('material_id',$request->idMaterial)
			->first(); 

			if( $stockDataS == null){
				$stockUpdate = new CurrentStock;
				$stockUpdate->project_id = $request->idProject;
				$stockUpdate->material_id = $request->idMaterial;
				$stockUpdate->vendor_id = $request->idVendor;
				$stockUpdate->quantity = $request->quantity;
				$stockUpdate->price = $request->price;
				$stockUpdate->user_id = $id;
			}

			else{
				$stockUpdate = CurrentStock:: find($stockDataS->current_stock_id);
				$stockUpdate->quantity = $stockDataS->quantity+$request->quantity;
			}

			
			
			if(($goodReceive->save()) && ($stockUpdate->save())){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $goodReceive), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Good Receive could can not be received!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Good Receive could can not be received!'), 400);
		}	

	}

	
	public function getAllGoodReceiveLists()
	{
		$goodReceive = GoodReceives::leftJoin('projects', 'gr.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'gr.material_id', '=', 'materials.material_id')
		->leftJoin('vendors', 'gr.vendor_id', '=', 'vendors.vendor_id')
		->select('projects.name AS Ename', 'vendors.name AS vname','materials.*','gr.*') 
		->get();
		return Response::json(['success' => true, 'data' => $goodReceive], 200);
	}

	public function getGoodReceiveById(Request $request)
	{
		$id=$request->header('idUser');
		$goodReceive = GoodReceives::select('gr.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $goodReceive], 200);
	}

	public function deleteGoodReceiveSingleHistory ($id){
		$goodReceiveCheck= GoodReceives::select('gr.*')->where('gr_id',$id)->first();
		$currentStockOut =CurrentStock:: select('current_stock.*')
		->where('project_id',$goodReceiveCheck->project_id)
		->where('material_id',$goodReceiveCheck->material_id)
		->first();
		if($currentStockOut->quantity>=$goodReceiveCheck->quantity){
			$stockReverse = CurrentStock:: find($currentStockOut->current_stock_id);
			$stockReverse->quantity = $currentStockOut->quantity-$goodReceiveCheck->quantity;

			if($stockReverse->save()){
				DB::commit();			
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Transaction Could can not be Deleted!'), 400);
			}

			$goodReceiveDelete = GoodReceives::where('gr_id',$id)->first();
			$goodReceiveDelete->delete();
			return Response::json(['success' => true, 'data' => $goodReceiveDelete], 200);

		}

		else{
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Sorry!!! You Made a Mistake.'), 400);
		}
		
	}

}