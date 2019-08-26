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
use Response;
use DB;
use Validator;

class BankLoanController extends Controller
{
	public function saveBankLoan (Request $request)
	{
		

		$rules = [
			'idProject' => 'required |numeric',
			'bankname' => 'required',
			'banklocation' => 'required',
			'amount' => 'required |numeric',
			'desc' => 'required',
			];

		$messages = [
			'idProject.required' => 'Project is required!',
			'bankname.required' => 'Bank Name is required!',
			'banklocation.required' => 'Bank Location is required!',
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

            $bankLoan = new BankLoans;
			$bankLoan->project_id = $request->idProject;
			$bankLoan->bank_name = $request->bankname;
			$bankLoan->bank_location = $request->banklocation;
			$bankLoan->amount = $request->amount;
			$bankLoan->description = $request->description;
			$bankLoan->user_id = $id;
			
			if($bankLoan->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $bankLoan), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Bank Loan Post could can not be issued!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Bank Loan Post could can not be issued!'), 400);
		}	

	}

	
	public function getBankLoanLists()
	{
		$bankLoan = BankLoans::select('bank_loans.*')->get();
		return Response::json(['success' => true, 'data' => $bankLoan], 200);
	}

	public function getBankLoanById(Request $request)
	{
		$id=$request->header('idUser');
		$bankLoan = BankLoans::select('bank_loans.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $bankLoan], 200);
	}

}