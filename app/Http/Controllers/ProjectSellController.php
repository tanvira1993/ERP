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
use App\SellMaterials;
use App\SellProjects;
use Response;
use DB;
use Validator;

class ProjectSellController extends Controller
{
	public function saveProjectSell (Request $request)
	{
		

		$rules = [
			'idProject' => 'required |numeric',
			'idCustomer' => 'required |numeric',
			'amount' => 'required |numeric',
           
           ];

		$messages = [
			'idProject.required' => 'Project is required!',
			'idCustomer.required' => 'Customer is required!',
			'amount.required' => 'Amount is required!',
			
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

            $projectSell = new SellProjects;
			$projectSell->project_id = $request->idProject;
			$projectSell->customer_id = $request->idCustomer;
			$projectSell->selling_amount = $request->amount;
			$projectSell->user_id = $id;
			
			if($projectSell->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $projectSell), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Good Sell could can not be issued!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Good Sell could can not be issued!'), 400);
		}	

	}

	
	public function getProjectSellLists()
	{
		$projectSell = SellProjects::select('sell_projects.*')->get();
		return Response::json(['success' => true, 'data' => $projectSell], 200);
	}

	public function getProjectSellById(Request $request)
	{
		$id=$request->header('idUser');
		$projectSell = SellProjects::select('sell_projects.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $projectSell], 200);
	}

}