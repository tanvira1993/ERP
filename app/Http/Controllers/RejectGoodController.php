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
use App\TransferMaterials;
use App\RejectGoods;
use Response;
use DB;
use Validator;

class RejectGoodController extends Controller
{
	public function saveRejectGood (Request $request)
	{
		

		$rules = [
			'idProject' => 'required |numeric',
			'idMaterial' => 'required |numeric',
			'idVendor' => 'required | numeric',
			'quantity' => 'required |numeric',
			'price' => 'required |numeric',
			'remarks' => 'required',
			];

		$messages = [
			'idProject.required' => 'Project is required!',
			'idMaterial.required' => 'Material is required!',
			'idVendor.required' => 'Vendor is required!',
			'quantity.required' => 'Quantity is required!',
			'price.required' => 'Price is required!',
			'remarks.required' => 'Remarks is required!',			

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

            $rejectGood = new RejectGoods;
			$rejectGood->project_id = $request->idProject;
			$rejectGood->material_id = $request->idMaterial;
			$rejectGood->vendor_id = $request->idVendor;
			$rejectGood->quantity = $request->quantity;
			$rejectGood->price = $request->price;
			$rejectGood->remarks = $request->remarks;
			$rejectGood->user_id = $id;
			
			if($rejectGood->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $rejectGood), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Reject Good could can not be done!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Reject Good could can not be done!'), 400);
		}	

	}

	
	public function getRejectGoodsLists()
	{
		$rejectGood = RejectGoods::select('reject_goods.*')->get();
		return Response::json(['success' => true, 'data' => $rejectGood], 200);
	}

	public function getRejectGoodById(Request $request)
	{
		$id=$request->header('idUser');
		$rejectGood = RejectGoods::select('reject_goods.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $rejectGood], 200);
	}

}