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
use App\PurchaseOrders;
use App\Documents;
use Response;
use DB;
use Validator;

class POApprovalController extends Controller
{

	public function getLevelOneApprovalList(Request $request)
	{
		$z=0;
		$id=$request->header('idUser');		
		$one = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
		->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
		->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
		->where('po.l1',$z)
		->where('po.l2',$z)
		->where('po.l3',$z)
		->where('po.l4',$z)
		->where('releases.user_id_l1',$id)
		->get();
		return Response::json(['success' => true, 'data' => $one], 200);
	}
	public function getLevelTwoApprovalList(Request $request)
	{
		$id=$request->header('idUser');
		$two = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
		->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
		->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
		->where('po.l1',1)		
		->where('po.l2',0)		
		->where('po.l3',0)		
		->where('po.l4',0)
		->where('releases.user_id_l2',$id)	
		->get();
		return Response::json(['success' => true, 'data' => $two], 200);
	}
	public function getLevelThreeApprovalList(Request $request)
	{
		$id=$request->header('idUser');
		$three = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
		->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
		->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
		->where('po.l1',1)		
		->where('po.l2',1)		
		->where('po.l3',0)		
		->where('po.l4',0)
		->where('releases.user_id_l3',$id)	
		->get();
		return Response::json(['success' => true, 'data' => $three], 200);
	}
	public function getLevelFourApprovalList(Request $request)
	{
		$id=$request->header('idUser');
		$four = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
		->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
		->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
		->where('po.l1',1)		
		->where('po.l2',1)		
		->where('po.l3',1)		
		->where('po.l4',0)
		->where('releases.user_id_l4',$id)	
		->get();
		return Response::json(['success' => true, 'data' => $four], 200);
	}

	
	public function getPOApprovedListById(Request $request)
	{
		$id=$request->header('idUser');	
		$checkLevel = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
		->select('releases.release_level')		
		->get()
		->toArray();
		$approvePo=null;
		/*echo '<pre>';
		print_r($checkLevel);
		echo '</pre>';
		exit;*/

		if (isset($checkLevel))
		{
			foreach ($checkLevel as $value) {
				
				

				if( $value['release_level']==1)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',0)		
					->where('po.l3',0)		
					->where('po.l4',0)
					->where('po.user_id',$id)					
					->get();			
				}

				if( $value['release_level']==2)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',1)		
					->where('po.l3',0)		
					->where('po.l4',0)
					->where('po.user_id',$id)					
					->get();			
				}

				if( $value['release_level']==3)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',1)		
					->where('po.l3',1)		
					->where('po.l4',0)
					->where('po.user_id',$id)					
					->get();			
				}
				if($value['release_level']==4)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',1)		
					->where('po.l3',1)		
					->where('po.l4',1)
					->where('po.user_id',$id)					
					->get();			
				}

			}

		}
		else
		{
			$approvePo=null;
			/*echo '<pre>';
			print_r($approvePr);
			echo '</pre>';
			exit;*/
		}
		return Response::json(['success' => true, 'data' => $approvePo], 200);
	}

	public function getPOApprovedList(Request $request)
	{
		$checkLevel = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
		->select('releases.release_level')		
		->get()
		->toArray();
		$approvePo=null;
		/*echo '<pre>';
		print_r($checkLevel);
		echo '</pre>';
		exit;*/

		if (isset($checkLevel))
		{
			foreach ($checkLevel as $value) {
				
				

				if( $value['release_level']==1)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',0)		
					->where('po.l3',0)		
					->where('po.l4',0)
					->get();			
				}

				if( $value['release_level']==2)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',1)		
					->where('po.l3',0)		
					->where('po.l4',0)
					->get();			
				}

				if( $value['release_level']==3)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',1)		
					->where('po.l3',1)		
					->where('po.l4',0)
					->get();			
				}
				if($value['release_level']==4)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',1)		
					->where('po.l3',1)		
					->where('po.l4',1)
					->get();			
				}

			}

		}
		else
		{
			$approvePo=null;
			/*echo '<pre>';
			print_r($approvePr);
			echo '</pre>';
			exit;*/
		}
		return Response::json(['success' => true, 'data' => $approvePo], 200);
	}

	public function getPORejectedList(Request $request)
	{
		$checkLevel = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
		->select('releases.release_level')		
		->get()
		->toArray();
		$approvePo=null;
		/*echo '<pre>';
		print_r($checkLevel);
		echo '</pre>';
		exit;*/

		if (isset($checkLevel))
		{
			foreach ($checkLevel as $value) {
				
				

				if( $value['release_level']==1)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',-1)		
					->where('po.l2',0)		
					->where('po.l3',0)		
					->where('po.l4',0)
					->get();			
				}

				if( $value['release_level']==2)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',-1)		
					->where('po.l3',0)		
					->where('po.l4',0)
					->get();			
				}

				if( $value['release_level']==3)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',1)		
					->where('po.l3',-1)		
					->where('po.l4',0)
					->get();			
				}
				if($value['release_level']==4)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',1)		
					->where('po.l3',1)		
					->where('po.l4',-1)
					->get();			
				}

			}

		}
		else
		{
			$approvePo=null;
			/*echo '<pre>';
			print_r($approvePr);
			echo '</pre>';
			exit;*/
		}
		return Response::json(['success' => true, 'data' => $approvePo], 200);
	}

	public function getPORejectedListById(Request $request)
	{
		$id=$request->header('idUser');			
		$checkLevel = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
		->select('releases.release_level')		
		->get()
		->toArray();
		$approvePo=null;
		/*echo '<pre>';
		print_r($checkLevel);
		echo '</pre>';
		exit;*/

		if (isset($checkLevel))
		{
			foreach ($checkLevel as $value) {
				
				

				if( $value['release_level']==1)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',-1)		
					->where('po.l2',0)		
					->where('po.l3',0)		
					->where('po.l4',0)
					->where('po.user_id',$id)
					->get();			
				}

				if( $value['release_level']==2)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',-1)		
					->where('po.l3',0)		
					->where('po.l4',0)
					->where('po.user_id',$id)					
					->get();			
				}

				if( $value['release_level']==3)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',1)		
					->where('po.l3',-1)		
					->where('po.l4',0)
					->where('po.user_id',$id)
					->get();			
				}
				if($value['release_level']==4)
				{
					$approvePo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
					->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
					->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
					->select('projects.name AS Pname', 'materials.*','po.*','releases.*')
					->where('po.l1',1)		
					->where('po.l2',1)		
					->where('po.l3',1)		
					->where('po.l4',-1)
					->where('po.user_id',$id)					
					->get();			
				}

			}

		}
		else
		{
			$approvePo=null;
			/*echo '<pre>';
			print_r($approvePr);
			echo '</pre>';
			exit;*/
		}
		return Response::json(['success' => true, 'data' => $approvePo], 200);
	}

	public function makeApprove( Request $request, $po,$l1,$l2,$l3,$l4)
	{

		/*echo '<pre>';
		print_r($l4);
		echo '</pre>';
		exit;*/
		$id=$request->header('idUser');
		$check=PurchaseOrders::leftJoin('releases', 'po.release_id', '=', 'releases.release_id')
		->where('po.po_id', $po)
		->select('releases.*')
		->first();

		if($l1==0 && $l2==0 && $l3==0 && $l4==0 && $check->user_id_l1==$id)
		{
			$poApprove = PurchaseOrders:: find($po);
			$poApprove->l1 = 1;

			if($poApprove->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $poApprove), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Approve could can not be done!'), 400);
			}
		}

		if($l1==1 && $l2==0 && $l3==0 && $l4==0 && $check->user_id_l2==$id)
		{
			$poApprove = PurchaseOrders:: find($po);
			$poApprove->l2 = 1;

			if($poApprove->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $poApprove), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Approve could can not be done!'), 400);
			}
		}

		if($l1==1 && $l2==1 && $l3==0 && $l4==0 && $check->user_id_l3==$id)
		{
			$poApprove = PurchaseOrders:: find($po);
			$poApprove->l3 = 1;

			if($poApprove->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $poApprove), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Approve could can not be done!'), 400);
			}
		}

		if($l1==1 && $l2==1 && $l3==1 && $l4==0 && $check->user_id_l4==$id)
		{
			$poApprove = PurchaseOrders:: find($po);
			$poApprove->l4= 1;

			if($poApprove->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $poApprove), 200);
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

	public function makeReject( Request $request, $po,$l1,$l2,$l3,$l4)
	{

		/*echo '<pre>';
		print_r($l4);
		echo '</pre>';
		exit;*/
		$id=$request->header('idUser');
		$check=PurchaseOrders::leftJoin('releases', 'po.release_id', '=', 'releases.release_id')
		->where('po.po_id', $po)
		->select('releases.*')
		->first();

		if($l1==0 && $l2==0 && $l3==0 && $l4==0 && $check->user_id_l1==$id)
		{
			$poReject = PurchaseOrders:: find($po);
			$poReject->l1 = -1;

			if($poReject->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $poReject), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Reject could can not be done!'), 400);
			}
		}

		if($l1==1 && $l2==0 && $l3==0 && $l4==0 && $check->user_id_l2==$id)
		{
			$poReject = PurchaseOrders:: find($po);
			$poReject->l2 = -1;

			if($poReject->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $poReject), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Reject could can not be done!'), 400);
			}
		}

		if($l1==1 && $l2==1 && $l3==0 && $l4==0 && $check->user_id_l3==$id)
		{
			$poReject = PurchaseOrders:: find($po);
			$poReject->l3 = -1;

			if($poReject->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $poReject), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Reject could can not be done!'), 400);
			}
		}

		if($l1==1 && $l2==1 && $l3==1 && $l4==0 && $check->user_id_l4==$id)
		{
			$poReject = PurchaseOrders:: find($po);
			$poReject->l4= -1;

			if($poReject->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $poReject), 200);
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

	public function getPoStateInfoListById(Request $request, $id)
	{
		$poStateInfo = Releases::leftJoin('po', 'po.release_id', '=', 'releases.release_id')
		->leftJoin('projects', 'po.project_id', '=', 'projects.project_id')
		->leftJoin('materials', 'po.material_id', '=', 'materials.material_id')
		->leftJoin('vendors', 'po.vendor_id', '=', 'vendors.vendor_id')
		->select('projects.name AS Pname', 'vendors.name AS vname','materials.*','po.*') 
		->where('po_id',$id)
		->first();

		return Response::json(['success' => true, 'data' => $poStateInfo], 200);
		
	} 

}