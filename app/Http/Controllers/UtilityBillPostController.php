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
use App\UtilityBillPosts;
use Response;
use DB;
use Validator;

class UtilityBillPostController extends Controller
{
	public function saveUtilityBillPost (Request $request)
	{
		

		$rules = [
			'idProject' => 'required |numeric',
			'idMaterial' => 'required |numeric',
			'amount' => 'required |numeric',
			'desc' => 'required',
			];

		$messages = [
			'idProject.required' => 'Project is required!',
			'idMaterial.required' => 'Material is required!',
			'amount.required' => 'Amount is required!',
			'desc.required' => 'Description is required!',
			

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

            $utilityBillPost = new UtilityBillPosts;
			$utilityBillPost->project_id = $request->idProject;
			$utilityBillPost->material_id = $request->idMaterial;
			$utilityBillPost->amount = $request->amount;
			$utilityBillPost->description = $request->description;
			$utilityBillPost->user_id = $id;
			
			if($utilityBillPost->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $utilityBillPost), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Utility Bill Post could can not be issued!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Utility Bill Post could can not be issued!'), 400);
		}	

	}

	
	public function getUtilityBillPostLists()
	{
		$utilityBillPost = UtilityBillPosts::select('utility_bill_posts.*')->get();
		return Response::json(['success' => true, 'data' => $utilityBillPost], 200);
	}

	public function getUtilityBillPostById(Request $request)
	{
		$id=$request->header('idUser');
		$utilityBillPost = UtilityBillPosts::select('utility_bill_posts.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $utilityBillPost], 200);
	}

}