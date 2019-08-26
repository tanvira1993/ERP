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
use Response;
use DB;
use Validator;

class GoodSellController extends Controller
{
	public function saveGoodSell (Request $request)
	{
		

		$rules = [
			'idProject' => 'required |numeric',
			'idMaterial' => 'required |numeric',
			'idCustomer' => 'required |numeric',
			'quantity' => 'required |numeric',
            'price' => 'required |numeric',
           
			
			];

		$messages = [
			'idProject.required' => 'Project is required!',
			'idMaterial.required' => 'Material is required!',
			'idCustomer.required' => 'Customer is required!',
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

            $goodSell = new SellMaterials;
			$goodSell->project_id = $request->idProject;
			$goodSell->material_id = $request->idMaterial;
			$goodSell->customer_id = $request->idCustomer;
			$goodSell->quantity = $request->quantity;
			$goodSell->price = $request->price;
			$goodSell->user_id = $id;
			
			if($goodSell->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $goodSell), 200);
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

	
	public function getGoodSellLists()
	{
		$goodSell = SellMaterials::select('sell_materials.*')->get();
		return Response::json(['success' => true, 'data' => $goodSell], 200);
	}

	public function getGoodSellById(Request $request)
	{
		$id=$request->header('idUser');
		$goodSell = SellMaterials::select('sell_materials.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $goodSell], 200);
	}

}