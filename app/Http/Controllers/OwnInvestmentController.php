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
use Response;
use DB;
use Validator;

class OwnInvestmentController extends Controller
{
	public function saveOwnInvestment (Request $request)
	{
		

		$rules = [
			'idProject' => 'required |numeric',
			'amount' => 'required |numeric',
			'desc' => 'required',
			];

		$messages = [
			'idProject.required' => 'Project is required!',
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

            $ownInvestment = new OwnInvestments;
			$ownInvestment->project_id = $request->idProject;
			$ownInvestment->amount = $request->amount;
			$ownInvestment->description = $request->description;
			$ownInvestment->user_id = $id;
			
			if($ownInvestment->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $ownInvestment), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Own Investment Post could can not be issued!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Own Investment Post could can not be issued!'), 400);
		}	

	}

	
	public function getOwnInvestmentLists()
	{
		$ownInvestment = OwnInvestments::select('own_investments.*')->get();
		return Response::json(['success' => true, 'data' => $ownInvestment], 200);
	}

	public function getOwnInvestmentById(Request $request)
	{
		$id=$request->header('idUser');
		$ownInvestment = OwnInvestments::select('own_investments.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $ownInvestment], 200);
	}

}