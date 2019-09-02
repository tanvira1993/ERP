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

class PRApprovalController extends Controller
{

	public function getLevelOneApprovalList(Request $request)
	{
		$z=0;
		$id=$request->header('idUser');		
		$one = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
		->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
		->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
		->where('pr.l1',$z)
		->where('pr.l2',$z)
		->where('pr.l3',$z)
		->where('pr.l4',$z)
		->where('releases.user_id_l1',$id)
		->get();
		return Response::json(['success' => true, 'data' => $one], 200);
	}
	public function getLevelTwoApprovalList(Request $request)
	{
		$id=$request->header('idUser');
		$two = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
		->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
		->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
		->where('pr.l1',1)		
		->where('pr.l2',0)		
		->where('pr.l3',0)		
		->where('pr.l4',0)
		->where('releases.user_id_l2',$id)	
		->get();
		return Response::json(['success' => true, 'data' => $two], 200);
	}
	public function getLevelThreeApprovalList(Request $request)
	{
		$id=$request->header('idUser');
		$three = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
		->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
		->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
		->where('pr.l1',1)		
		->where('pr.l2',1)		
		->where('pr.l3',0)		
		->where('pr.l4',0)
		->where('releases.user_id_l3',$id)	
		->get();
		return Response::json(['success' => true, 'data' => $three], 200);
	}
	public function getLevelFourApprovalList(Request $request)
	{
		$id=$request->header('idUser');
		$four = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
		->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
		->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
		->where('pr.l1',1)		
		->where('pr.l2',1)		
		->where('pr.l3',1)		
		->where('pr.l4',0)
		->where('releases.user_id_l4',$id)	
		->get();
		return Response::json(['success' => true, 'data' => $four], 200);
	}

	
	public function getPRApprovedListById(Request $request)
	{
		$id=$request->header('idUser');	
		$checkLevel = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
		->select('releases.release_level')		
		->get()
		->toArray();
		$approvePr=null;
		/*echo '<pre>';
		print_r($checkLevel);
		echo '</pre>';
		exit;*/

		if (isset($checkLevel))
		{
			foreach ($checkLevel as $value) {
				
				

				if( $value['release_level']==1)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',0)		
					->where('pr.l3',0)		
					->where('pr.l4',0)
					->where('pr.user_id',$id)					
					->get();			
				}

				if( $value['release_level']==2)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',1)		
					->where('pr.l3',0)		
					->where('pr.l4',0)
					->where('pr.user_id',$id)					
					->get();			
				}

				if( $value['release_level']==3)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',1)		
					->where('pr.l3',1)		
					->where('pr.l4',0)
					->where('pr.user_id',$id)					
					->get();			
				}
				if($value['release_level']==4)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',1)		
					->where('pr.l3',1)		
					->where('pr.l4',1)
					->where('pr.user_id',$id)					
					->get();			
				}

			}

		}
		else
		{
			$approvePr=null;
			/*echo '<pre>';
			print_r($approvePr);
			echo '</pre>';
			exit;*/
		}
		return Response::json(['success' => true, 'data' => $approvePr], 200);
	}

	public function getPRApprovedList(Request $request)
	{
		$checkLevel = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
		->select('releases.release_level')		
		->get()
		->toArray();
		$approvePr=null;
		/*echo '<pre>';
		print_r($checkLevel);
		echo '</pre>';
		exit;*/

		if (isset($checkLevel))
		{
			foreach ($checkLevel as $value) {
				
				

				if( $value['release_level']==1)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',0)		
					->where('pr.l3',0)		
					->where('pr.l4',0)
					->get();			
				}

				if( $value['release_level']==2)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',1)		
					->where('pr.l3',0)		
					->where('pr.l4',0)
					->get();			
				}

				if( $value['release_level']==3)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',1)		
					->where('pr.l3',1)		
					->where('pr.l4',0)
					->get();			
				}
				if($value['release_level']==4)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',1)		
					->where('pr.l3',1)		
					->where('pr.l4',1)
					->get();			
				}

			}

		}
		else
		{
			$approvePr=null;
			/*echo '<pre>';
			print_r($approvePr);
			echo '</pre>';
			exit;*/
		}
		return Response::json(['success' => true, 'data' => $approvePr], 200);
	}

	public function getPRRejectedList(Request $request)
	{
		$checkLevel = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
		->select('releases.release_level')		
		->get()
		->toArray();
		$approvePr=null;
		/*echo '<pre>';
		print_r($checkLevel);
		echo '</pre>';
		exit;*/

		if (isset($checkLevel))
		{
			foreach ($checkLevel as $value) {
				
				

				if( $value['release_level']==1)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',-1)		
					->where('pr.l2',0)		
					->where('pr.l3',0)		
					->where('pr.l4',0)
					->get();			
				}

				if( $value['release_level']==2)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',-1)		
					->where('pr.l3',0)		
					->where('pr.l4',0)
					->get();			
				}

				if( $value['release_level']==3)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',1)		
					->where('pr.l3',-1)		
					->where('pr.l4',0)
					->get();			
				}
				if($value['release_level']==4)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',1)		
					->where('pr.l3',1)		
					->where('pr.l4',-1)
					->get();			
				}

			}

		}
		else
		{
			$approvePr=null;
			/*echo '<pre>';
			print_r($approvePr);
			echo '</pre>';
			exit;*/
		}
		return Response::json(['success' => true, 'data' => $approvePr], 200);
	}

	public function getPRRejectedListById(Request $request)
	{
		$id=$request->header('idUser');			
		$checkLevel = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
		->select('releases.release_level')		
		->get()
		->toArray();
		$approvePr=null;
		/*echo '<pre>';
		print_r($checkLevel);
		echo '</pre>';
		exit;*/

		if (isset($checkLevel))
		{
			foreach ($checkLevel as $value) {
				
				

				if( $value['release_level']==1)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',-1)		
					->where('pr.l2',0)		
					->where('pr.l3',0)		
					->where('pr.l4',0)
					->where('pr.user_id',$id)
					->get();			
				}

				if( $value['release_level']==2)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',-1)		
					->where('pr.l3',0)		
					->where('pr.l4',0)
					->where('pr.user_id',$id)					
					->get();			
				}

				if( $value['release_level']==3)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',1)		
					->where('pr.l3',-1)		
					->where('pr.l4',0)
					->where('pr.user_id',$id)
					->get();			
				}
				if($value['release_level']==4)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
					->where('pr.l1',1)		
					->where('pr.l2',1)		
					->where('pr.l3',1)		
					->where('pr.l4',-1)
					->where('pr.user_id',$id)					
					->get();			
				}

			}

		}
		else
		{
			$approvePr=null;
			/*echo '<pre>';
			print_r($approvePr);
			echo '</pre>';
			exit;*/
		}
		return Response::json(['success' => true, 'data' => $approvePr], 200);
	}

	public function makeApprove( Request $request, $pr,$l1,$l2,$l3,$l4)
	{

		/*echo '<pre>';
		print_r($l4);
		echo '</pre>';
		exit;*/
		$id=$request->header('idUser');
		$check=Requisitions::leftJoin('releases', 'pr.release_id', '=', 'releases.release_id')
		->where('pr.pr_id', $pr)
		->select('releases.*')
		->first();

		if($l1==0 && $l2==0 && $l3==0 && $l4==0 && $check->user_id_l1==$id)
		{
			$prApprove = Requisitions:: find($pr);
			$prApprove->l1 = 1;

			if($prApprove->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $prApprove), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Approve could can not be done!'), 400);
			}
		}

		if($l1==1 && $l2==0 && $l3==0 && $l4==0 && $check->user_id_l2==$id)
		{
			$prApprove = Requisitions:: find($pr);
			$prApprove->l2 = 1;

			if($prApprove->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $prApprove), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Approve could can not be done!'), 400);
			}
		}

		if($l1==1 && $l2==1 && $l3==0 && $l4==0 && $check->user_id_l3==$id)
		{
			$prApprove = Requisitions:: find($pr);
			$prApprove->l3 = 1;

			if($prApprove->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $prApprove), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Approve could can not be done!'), 400);
			}
		}

		if($l1==1 && $l2==1 && $l3==1 && $l4==0 && $check->user_id_l4==$id)
		{
			$prApprove = Requisitions:: find($pr);
			$prApprove->l4= 1;

			if($prApprove->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $prApprove), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Approve could can not be done!'), 400);
			}
		}
		
		else
		{

			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Not Approved..!'), 400);
		}

	}

	public function makeReject( Request $request, $pr,$l1,$l2,$l3,$l4)
	{

		/*echo '<pre>';
		print_r($l4);
		echo '</pre>';
		exit;*/
		$id=$request->header('idUser');
		$check=Requisitions::leftJoin('releases', 'pr.release_id', '=', 'releases.release_id')
		->where('pr.pr_id', $pr)
		->select('releases.*')
		->first();

		if($l1==0 && $l2==0 && $l3==0 && $l4==0 && $check->user_id_l1==$id)
		{
			$prReject = Requisitions:: find($pr);
			$prReject->l1 = -1;

			if($prReject->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $prReject), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Reject could can not be done!'), 400);
			}
		}

		if($l1==1 && $l2==0 && $l3==0 && $l4==0 && $check->user_id_l2==$id)
		{
			$prReject = Requisitions:: find($pr);
			$prReject->l2 = -1;

			if($prReject->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $prReject), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Reject could can not be done!'), 400);
			}
		}

		if($l1==1 && $l2==1 && $l3==0 && $l4==0 && $check->user_id_l3==$id)
		{
			$prReject = Requisitions:: find($pr);
			$prReject->l3 = -1;

			if($prReject->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $prReject), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Reject could can not be done!'), 400);
			}
		}

		if($l1==1 && $l2==1 && $l3==1 && $l4==0 && $check->user_id_l4==$id)
		{
			$prReject = Requisitions:: find($pr);
			$prReject->l4= -1;

			if($prReject->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $prReject), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Reject could can not be done!'), 400);
			}
		}
		
		else
		{

			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Not Approved..!'), 400);
		}

	}

	public function getPrStateInfoListById(Request $request, $id)
	{
		$prStateInfo = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
		->leftJoin('projects', 'pr.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'pr.material_id', '=', 'materials.material_id')
		->select('projects.name AS Pname', 'materials.*','pr.*','releases.*')
		->where('pr_id',$id)
		->first();

		return Response::json(['success' => true, 'data' => $prStateInfo], 200);
		
	}

}