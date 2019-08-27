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
use App\Releases;
use App\Documents;
use Response;
use DB;
use Validator;

class ReleaseController extends Controller
{
	public function saveRelease (Request $request)
	{	

		$rules = [
			'iddocument' => 'required |numeric',
			'idProject' => 'required|numeric',
			'idUser1' => 'required|numeric',
		];

		$messages = [
			'iddocument.required' => 'Document is required!',
			'idProject.required' => 'Project is required!',
			'idUser1.required' => '1st Level Approver is required!',
			
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

			$release = new Releases;
			$release->document_id = $request->iddocument;
			$release->project_id = $request->idProject;
			$release->user_id_l1 = $request->idUser1;
			$release->user_id_l2 = $request->idUser2;
			$release->user_id_l3 = $request->idUser3;
			$release->user_id_l4 = $request->idUser4;
			if($request->idUser1!=null && $request->idUser2==null && $request->idUser3==null && $request->idUser4==null)
			{
				$level=1;
			}

			if($request->idUser1!=null && $request->idUser2!=null && $request->idUser3==null && $request->idUser4==null)
			{
				$level=2;
			}
			if($request->idUser1!=null && $request->idUser2!=null && $request->idUser3!=null && $request->idUser4==null)
			{
				$level=3;
			}

			if($request->idUser1!=null && $request->idUser2!=null && $request->idUser3!=null && $request->idUser4!=null)
			{
				$level=4;
			}
			$release->release_level = $level;
			$release->user_id = $id;
			
			if($release->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $release), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Release Strategy could can not be Created!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Release Strategy could can not be Created!'), 400);
		}	

	}



}