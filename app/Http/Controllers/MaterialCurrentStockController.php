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
use App\RejectGoods;
use App\TransferMaterials;
use App\CurrentStock;
use Response;
use DB;
use Validator;

class MaterialCurrentStockController extends Controller
{

	public function getBankLoanById(Request $request)
	{
		$id=$request->header('idUser');
		$bankLoan = BankLoans::select('bank_loans.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $bankLoan], 200);
	}

}