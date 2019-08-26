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
use Response;
use DB;
use Validator;

class AdvancePaymentController extends Controller
{
	public function saveAdvancePayment (Request $request)
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

            $advancePayment = new ProjectAdvancePayments;
			$advancePayment->project_id = $request->idProject;
			$advancePayment->customer_id = $request->idCustomer;
			$advancePayment->payment_amount = $request->amount;
			$advancePayment->user_id = $id;
			
			if($advancePayment->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $advancePayment), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Advance Payment Post could can not be issued!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Advance Payment Post could can not be issued!'), 400);
		}	

	}

	
	public function getAdvancePaymentLists()
	{
		$advancePayment = ProjectAdvancePayments::select('project_advance_payments.*')->get();
		return Response::json(['success' => true, 'data' => $advancePayment], 200);
	}

	public function getAdvancePaymentById(Request $request)
	{
		$id=$request->header('idUser');
		$advancePayment = ProjectAdvancePayments::select('project_advance_payments.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $advancePayment], 200);
	}

}