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
use App\CurrentStock;
use App\ConsumeMaterials;
use Response;
use DB;
use Validator;

class ConsumeGoodController extends Controller
{
	public function saveConsumeGood (Request $request)
	{
		

		$rules = [
			'idProject' => 'required |numeric',
			'idMaterial' => 'required |numeric',
			'quantity' => 'required |numeric',
		];

		$messages = [
			'idProject.required' => 'Project is required!',
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

			$consumeGood = new ConsumeMaterials;
			$consumeGood->project_id = $request->idProject;
			$consumeGood->material_id = $request->idMaterial;
			$consumeGood->quantity = $request->quantity;
			$consumeGood->user_id = $id;

			

			$stockData=CurrentStock::select('current_stock.*')
			->where('project_id',$consumeGood->project_id)
			->where('material_id',$consumeGood->material_id)
			->first();

			$consume=$consumeGood->quantity;
			/*echo '<pre>';
			print_r($stockData);
			echo '</pre>';
			exit;*/
			$stock=$stockData->quantity;

			if($stock>=$consume)
			{
				$stockUpdate = CurrentStock:: find($stockData->current_stock_id);			
				$stockUpdate->quantity = ($stock-$consume);
				$stockUpdate->user_id = $id;

				if(($consumeGood->save()) && ($stockUpdate->save())){
					DB::commit();
					return Response::json(array('success' => TRUE, 'data' => $consumeGood), 200);
				}

				else{

					DB::rollback();
					return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Consume Good could can not be issued!'), 400);
				}
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Consume Good could can not be issued!'), 400);
			}
		}
		
		catch (\Exception $e) {
			// echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Consume Good could can not be issued!'), 400);
		}	

	}

	
	public function getAllConsumeGoodLists()
	{
		$consumeGood = ConsumeMaterials::select('consume_materials.*')->get();
		return Response::json(['success' => true, 'data' => $consumeGood], 200);
	}

	public function getConsumeGoodById(Request $request)
	{
		$id=$request->header('idUser');
		$consumeGood = ConsumeMaterials::select('consume_materials.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $consumeGood], 200);
	}

}