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
			
			if($goodReceive->save()){
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
		$goodReceive = GoodReceives::select('gr.*')->get();
		return Response::json(['success' => true, 'data' => $goodReceive], 200);
	}

	public function getGoodReceiveById(Request $request)
	{
		$id=$request->header('idUser');
		$goodReceive = GoodReceives::select('gr.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $goodReceive], 200);
	}

}