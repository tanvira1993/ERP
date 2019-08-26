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
use Response;
use DB;
use Validator;

class RequisitionController extends Controller
{
	public function saveRequisition (Request $request)
	{
		

		$rules = [
			'idProject' => 'required |numeric',
			'idMaterial' => 'required |numeric',
			'quantity' => 'required |numeric',
			'rName' => 'required',
		];

		$messages = [
			'idProject.required' => 'Project is required!',
			'idMaterial.required' => 'Material is required!',			
			'quantity.required' => 'Quantity is required!',
			'rName.required' => 'Name is required!',	

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

			$requisitions = new Requisitions;
			$requisitions->project_id = $request->idProject;
			$requisitions->material_id = $request->idMaterial;
			$requisitions->quantity = $request->quantity;
			$requisitions->requisition_name = $request->rName;
			$requisitions->vedor_info = $request->vendor;
			$requisitions->user_id = $id;

			
			if($requisitions->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $requisitions), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Requisitions could can not be created!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Requisitions could can not be created!'), 400);
		}	

	}

	
	public function getAllRequisitionLists()
	{
		$requisitions = Requisitions::select('pr.*')->get();
		return Response::json(['success' => true, 'data' => $requisitions], 200);
	}

	public function getRequisitionListsById(Request $request)
	{
		$id=$request->header('idUser');
		$requisitions = Requisitions::select('pr.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $requisitions], 200);
	}

}