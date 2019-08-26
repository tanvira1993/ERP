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
use App\BankLoans;
use App\OwnInvestments;
use App\ProjectAdvancePayments;
use App\LabourCosts;
use Response;
use DB;
use Validator;

class LabourCostController extends Controller
{
	public function saveLabourCost (Request $request)
	{
		

		$rules = [
			'idProject' => 'required |numeric',
			'labourquantity' => 'required |numeric',
            'cost' => 'required |numeric',
            'desc' => 'required',
			
			];

		$messages = [
			'idProject.required' => 'Project is required!',
			'labourquantity.required' => 'Labour Quantity is required!',
			'cost.required' => 'Cost is required!',
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

            $labourCost = new LabourCosts;
			$labourCost->project_id = $request->idProject;
			$labourCost->labour_quantity = $request->labourquantity;
			$labourCost->cost = $request->cost;
			$labourCost->details = $request->desc;
            $labourCost->user_id = $id;
			
			if($labourCost->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $labourCost), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Labour Cost Post could can not be issued!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Labour Cost Post could can not be issued!'), 400);
		}	

	}

	
	public function getLabourCostLists()
	{
		$labourCost = LabourCosts::select('labour_costs.*')->get();
		return Response::json(['success' => true, 'data' => $labourCost], 200);
	}

	public function getLabourCostById(Request $request)
	{
		$id=$request->header('idUser');
		$labourCost = LabourCosts::select('labour_costs.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $labourCost], 200);
	}

}