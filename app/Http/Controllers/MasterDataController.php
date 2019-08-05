<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Projects;
use App\Materials;
use Response;
use DB;
use Validator;

class MasterDataController extends Controller
{
	public function saveProject (Request $request)
	{
		

		$rules = [
			'name' => 'required| min:3|unique:projects,name',			
			'location' => 'required',
			'desc' => 'required',
		];

		$messages = [
			'name.required' => 'Name is required!',
			'name.unique' => 'This Project already created.',			
			'location.required' => 'Project Location is required!',
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

			$project = new Projects;
			$project->name = $request->name;
			$project->location = $request->location;
			$project->description = $request->desc;
			$project->user_id = $id;

			
			if($project->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $project), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Project could can not be created!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Project could can not be created!'), 400);
		}	

	}

	
	public function getAllProjectLists()
	{
		$projects = Projects::select('projects.*')->get();
		return Response::json(['success' => true, 'data' => $projects], 200);
	}

	public function saveMaterial (Request $request)
	{
		

		$rules = [
			'name' => 'required| min:3|unique:materials,name',			
			'type' => 'required',
			
		];

		$messages = [
			'name.required' => 'Name is required!',
			'name.unique' => 'This Material already created.',			
			'type.required' => 'Material Type is required!',

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

			$material = new Materials;
			$material->name = $request->name;
			$material->type = $request->type;
			$material->descriptions = $request->desc;
			$material->user_id = $id;

			
			if($material->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $material), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Material could can not be created!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Material could can not be created!'), 400);
		}	

	}

	public function getAllMaterialLists()
	{
		$projects = Materials::select('materials.*')->get();
		return Response::json(['success' => true, 'data' => $material], 200);
	}

}