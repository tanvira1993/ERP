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
use App\Releases;
use Response;
use DB;
use Validator;

class RequisitionController extends Controller
{
	public function saveRequisition (Request $request)
	{
		

		$rules = [
			'idProject' => 'required |numeric',
			'idMaterial' => 'required |numeric',
			'quantity' => 'required |numeric',
			'idDocument' => 'required |numeric',
			'rName' => 'required',
		];

		$messages = [
			'idProject.required' => 'Project is required!',
			'idDocument.required' => 'Document Type is required!',
			'idMaterial.required' => 'Material is required!',			
			'quantity.required' => 'Quantity is required!',
			'rName.required' => 'Name is required!',	

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

			$requisitions = new Requisitions;
			$requisitions->project_id = $request->idProject;
			$requisitions->material_id = $request->idMaterial;
			$requisitions->quantity = $request->quantity;
			$requisitions->requisition_name = $request->rName;
			$requisitions->vedor_info = $request->vendor;
			$requisitions->document_id = $request->idDocument;
			$requisitions->user_id = $id;
			$requisitions->l1 = 0;
			$requisitions->l2 = 0;
			$requisitions->l3 = 0;
			$requisitions->l4 = 0;
			$requisitionRelease = Releases::select('releases.*')
			->where('document_id',$request->idDocument)
			->where('project_id', $request->idProject)
			->first();
			if(isset($$requisitionRelease))
			{
				$requisitions->release_id = $requisitionRelease->release_id;

				if($requisitions->save()){
					DB::commit();
					return Response::json(array('success' => TRUE, 'data' => $requisitions), 200);
				}

				else{

					DB::rollback();
					return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Requisitions could can not be created!'), 400);
				}


			}
			else{
				$requisitions->release_id = 0;

				if($requisitions->save()){
					DB::commit();
					return Response::json(array('success' => TRUE, 'data' => $requisitions), 200);
				}

				else{

					DB::rollback();
					return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Requisitions could can not be created!'), 400);
				}
			}
		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Requisitions could can not be created!'), 400);
		}	

	}

	
	public function getAllRequisitionLists()
	{
		$requisitions = Requisitions::leftJoin('document_types', 'pr.document_id', '=', 'document_types.document_id')
		->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
		->select('projects.name AS Pname', 'materials.*','pr.*','document_types.*') 
		->where('pr.l1',0)		
		->where('pr.l2',0)		
		->where('pr.l3',0)		
		->where('pr.l4',0)
		->get();
		return Response::json(['success' => true, 'data' => $requisitions], 200);
	}

	public function getRequisitionListsById(Request $request)
	{
		$id=$request->header('idUser');
		$requisitions = Requisitions::leftJoin('document_types', 'pr.document_id', '=', 'document_types.document_id')
		->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
		->select('projects.name AS Pname', 'materials.*','pr.*','document_types.*') 
		->where('pr.l1',0)		
		->where('pr.l2',0)		
		->where('pr.l3',0)		
		->where('pr.l4',0)
		->where('pr.user_id', $id)
		->get();
		return Response::json(['success' => true, 'data' => $requisitions], 200);
	}

}