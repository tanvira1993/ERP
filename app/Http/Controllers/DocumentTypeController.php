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



class DocumentTypeController extends Controller
{
	public function saveDocumentType (Request $request)
	{
		

		$rules = [
			
			'docname' => 'required | min:3|unique:document_types,document_name',
			'desc' => 'required',
			];

		$messages = [
			
			'docname.required' => 'Document Name is required!',
			'docname.unique' => 'This Document Type is already created.',
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

            $documentType = new Documents;
			$documentType->document_name = $request->docname;
			$documentType->descriptions = $request->desc;
			$documentType->user_id = $id;
			
			if($documentType->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $documentType), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Document Type could can not be done!'), 400);
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Document Type could can not be done!'), 400);
		}	

	}

	
	public function getAlldocumentList()
	{
		$documentType = Documents::select('document_types.*')->get();
		return Response::json(['success' => true, 'data' => $documentType], 200);
	}

	public function getDocumentTypeById(Request $request)
	{
		$id=$request->header('idUser');
		$documentType = Documents::select('document_types.*')->where('user_id', $id)->get();
		return Response::json(['success' => true, 'data' => $documentType], 200);
	}

}