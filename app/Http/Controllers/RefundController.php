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
use App\CurrentStock;
use App\TransferMaterials;
use App\Refund;
use Response;
use DB;
use Validator;

class RefundController extends Controller
{
	public function saveRefund (Request $request)
	{
		

		$rules = [
			'idProjectS' => 'required |numeric',
			'idProjectR' => 'required |numeric',
			'idMaterial' => 'required |numeric',
			'quantity' => 'required |numeric',
			
		];

		$messages = [
			'idProjectS.required' => 'Project is required!',
			'idProjectR.required' => 'Project is required!',
			'idMaterial.required' => 'Material is required!',
			'quantity.required' => 'Quantity is required!',			

		];
		
		$validation = Validator::make($request->all(), $rules, $messages);

        // redirect on validation error
		if ($validation->fails()) {
			$errorMsgString = implode("<br/>",$validation->messages()->all());
			return Response::json(array('success' => false, 'heading' => 'Validation Error', 'message' => $errorMsgString), 400);
		}

		DB::beginTransaction();

		try {
			
			$transferGood = new Refund;
			$transferGood->supply_project_id = $request->idProjectS;
			$transferGood->receive_project_id = $request->idProjectR;
			$transferGood->material_id = $request->idMaterial;
			$transferGood->quantity = $request->quantity;			

			$stockDataS=CurrentStock::select('current_stock.*')
			->where('project_id',$transferGood->supply_project_id)
			->where('material_id',$transferGood->material_id)
			->first(); 
			$transfer=$transferGood->quantity;
			$stockS=$stockDataS->quantity;

			if($stockS>=$transfer)
			{
				$stockDataR=CurrentStock::select('current_stock.*')
				->where('project_id',$transferGood->receive_project_id)
				->where('material_id',$transferGood->material_id)
				->first();
				// $stockR=$stockDataR->quantity;

				if( $stockDataR == null)
				{
					$stockUpdateS = CurrentStock:: find($stockDataS->current_stock_id);			
					$stockUpdateS->quantity = ($stockS-$transfer);

					$stockUpdateR = new CurrentStock;
					$stockUpdateR->project_id = $request->idProjectR;
					$stockUpdateR->material_id = $request->idMaterial;
					$stockUpdateR->quantity = $transfer ;
					if(($transferGood->save()) && ($stockUpdateS->save()) && ($stockUpdateR->save()))
					{
						DB::commit();
						return Response::json(array('success' => TRUE, 'data' => $transferGood), 200);
					}

					else{

						DB::rollback();
						return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Refund could can not be transferred!'), 400);
					}
				}

				if( $stockDataR != null)
				{
					$stockUpdateS = CurrentStock:: find($stockDataS->current_stock_id);			
					$stockUpdateS->quantity = ($stockS-$transfer);

					$stockUpdateR = CurrentStock:: find($stockDataR->current_stock_id);			
					$stockUpdateR->quantity = ($stockDataR->quantity+($transfer));

					if(($transferGood->save()) && ($stockUpdateS->save()) && ($stockUpdateR->save()))
					{
						DB::commit();
						return Response::json(array('success' => TRUE, 'data' => $transferGood), 200);
					}

					else{

						DB::rollback();
						return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Refund could can not be transferred!'), 400);
					}


				} 
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Refund could can not be transferred!'), 400);
			}
		}

		catch (\Exception $e) {
			// echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Refund could can not be transferred!'), 400);
		}	

	}




}