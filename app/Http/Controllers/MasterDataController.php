<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Projects;
use App\Materials;
use App\Vendors;
use App\Customers;
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
			'type' => 'required'
		];

		$messages = [
			'name.required' => 'Name is required!',
			'name.unique' => 'This Project already created.',			
			'location.required' => 'Project Location is required!',
			'desc.required' => 'Description is required!',
			'type.required' => 'Select Employee Type'	

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
			$project->employee_role = $request->type;
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

	public function getAllProjectListsByLeader()
	{
		$projects = Projects::select('projects.*')->where('employee_role',1) ->get();
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
			'type.required' => 'Select Material Type!',

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
		$material = Materials::select('materials.*')->get();
		return Response::json(['success' => true, 'data' => $material], 200);
	}

	public function saveVendor (Request $request)
	{
		

		$rules = [
			'name' => 'required| min:3|unique:vendors,name',			
			'address' => 'required',
			'title' => 'required',
			'desc' => 'required',
			'phone' => 'required |numeric',
			
		];

		$messages = [
			'name.required' => 'Name is required!',
			'name.unique' => 'This Vendor already created.',			
			'address.required' => 'Address is required!',
			'phone.required' => 'Phone Number is required!',
			'title.required' => 'Title is required!',
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

			$vendor = new Vendors;
			$vendor->name = $request->name;
			$vendor->title = $request->title;
			$vendor->description = $request->desc;
			$vendor->address = $request->address;
			$vendor->phone_number = $request->phone;	
			$vendor->user_id = $id;

			
			if($vendor->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $vendor), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Vendor could can not be created!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Vendor could can not be created!'), 400);
		}	

	}

	public function getAllVendorLists()
	{
		$vendor = Vendors::select('vendors.*')->get();
		return Response::json(['success' => true, 'data' => $vendor], 200);
	}


	public function saveCustomer (Request $request)
	{
		

		$rules = [
			'name' => 'required| min:3|unique:customers,name',			
			'address' => 'required',
			'title' => 'required',
			'desc' => 'required',
			'phone' => 'required |numeric',
			
		];

		$messages = [
			'name.required' => 'Name is required!',
			'name.unique' => 'This Customer already created.',			
			'address.required' => 'Address is required!',
			'phone.required' => 'Phone Number is required!',
			'title.required' => 'Title is required!',
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

			$customer = new Customers;
			$customer->name = $request->name;
			$customer->title = $request->title;
			$customer->description = $request->desc;
			$customer->address = $request->address;
			$customer->phone_number = $request->phone;	
			$customer->user_id = $id;

			
			if($customer->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $customer), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Customer could can not be created!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Customer could can not be created!'), 400);
		}	

	}


	public function getAllCustomerLists()
	{
		$cutomer = Customers::select('customers.*')->get();
		return Response::json(['success' => true, 'data' => $cutomer], 200);
	}

}