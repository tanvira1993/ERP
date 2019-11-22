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
use Response;
use DB;
use Validator;

class TransferGoodController extends Controller
{
	public function saveTransferGood (Request $request)
	{
		

		$rules = [
			'idProjectS' => 'required |numeric',
			'idProjectR' => 'required |numeric',
			'idMaterial' => 'required |numeric',
			'quantity' => 'required |numeric',
			'lostQuantity' => 'nullable |numeric',
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
			$id=$request->header('idUser');

			$transferGood = new TransferMaterials;
			$transferGood->supply_project_id = $request->idProjectS;
			$transferGood->receive_project_id = $request->idProjectR;
			$transferGood->material_id = $request->idMaterial;
			$transferGood->quantity = $request->quantity;
			$transferGood->user_id = $id;
			$transferGood->lost_quantity = $request->lostQuantity;

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
					$stockUpdateS->user_id = $id;

					$stockUpdateR = new CurrentStock;
					$stockUpdateR->project_id = $request->idProjectR;
					$stockUpdateR->material_id = $request->idMaterial;
					$stockUpdateR->quantity = $transfer - $transferGood->lost_quantity;
					$stockUpdateR->price = $stockDataS->price;
					$stockUpdateR->user_id = $id;
					$stockUpdateR->vendor_id = $stockDataS->vendor_id;
					if(($transferGood->save()) && ($stockUpdateS->save()) && ($stockUpdateR->save()))
					{
						DB::commit();
						return Response::json(array('success' => TRUE, 'data' => $transferGood), 200);
					}

					else{

						DB::rollback();
						return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Transfer Good could can not be transferred!'), 400);
					}
				}

				if( $stockDataR != null)
				{
					$stockUpdateS = CurrentStock:: find($stockDataS->current_stock_id);			
					$stockUpdateS->quantity = ($stockS-$transfer);
					$stockUpdateS->user_id = $id;

					$stockUpdateR = CurrentStock:: find($stockDataR->current_stock_id);			
					$stockUpdateR->quantity = ($stockDataR->quantity+($transfer-$transferGood->lost_quantity));
					$stockUpdateR->user_id = $id;

					if(($transferGood->save()) && ($stockUpdateS->save()) && ($stockUpdateR->save()))
					{
						DB::commit();
						return Response::json(array('success' => TRUE, 'data' => $transferGood), 200);
					}

					else{

						DB::rollback();
						return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Transfer Good could can not be transferred!'), 400);
					}


				} 
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Transfer Good could can not be transferred!'), 400);
			}
		}

		catch (\Exception $e) {
			// echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Transfer Good could can not be transferred!'), 400);
		}	

	}


	public function getAllTransferGoodLists()
	{
		$transferGood = TransferMaterials::select('transfer_materials.*')->get();
		return Response::json(['success' => true, 'data' => $transferGood], 200);
	}

	public function getTransferGoodById(Request $request)
	{
		$id=$request->header('idUser');
		$transferGood = TransferMaterials::select('transfer_materials.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $transferGood], 200);
	}

}