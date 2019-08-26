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
use App\PurchaseOrders;
use Response;
use DB;
use Validator;

class PurchaseOrderController extends Controller
{
	public function savePurchaseOrder (Request $request)
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

			$purchaseOrder = new PurchaseOrders;
			$purchaseOrder->project_id = $request->idProject;
			$purchaseOrder->material_id = $request->idMaterial;
			$purchaseOrder->vendor_id = $request->idVendor;
			$purchaseOrder->quantity = $request->quantity;
			$purchaseOrder->price = $request->price;
			$purchaseOrder->user_id = $id;

			
			if($purchaseOrder->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $purchaseOrder), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Purchase Order could can not be created!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Purchase Order could can not be created!'), 400);
		}	

	}

	
	public function getAllPurchaseOrderLists()
	{
		$purchaseOrder = PurchaseOrders::select('po.*')->get();
		return Response::json(['success' => true, 'data' => $purchaseOrder], 200);
	}

	public function getPurchaseOrderById(Request $request)
	{
		$id=$request->header('idUser');
		$purchaseOrder = PurchaseOrders::select('po.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $purchaseOrder], 200);
	}

}