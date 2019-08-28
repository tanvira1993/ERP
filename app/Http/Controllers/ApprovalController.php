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

class ApprovalController extends Controller
{

	public function getLevelOneApprovalList(Request $request)
	{
		$z=0;
		$id=$request->header('idUser');		
		$one = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
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
					->where('pr.l1',1)		
					->where('pr.l2',0)		
					->where('pr.l3',0)		
					->where('pr.l4',0)
					->get();			
				}

				if( $value['release_level']==2)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->where('pr.l1',1)		
					->where('pr.l2',1)		
					->where('pr.l3',0)		
					->where('pr.l4',0)
					->get();			
				}

				if( $value['release_level']==3)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->where('pr.l1',1)		
					->where('pr.l2',1)		
					->where('pr.l3',1)		
					->where('pr.l4',0)
					->get();			
				}
				if($value['release_level']==4)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
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
					->where('pr.l1',-1)		
					->where('pr.l2',0)		
					->where('pr.l3',0)		
					->where('pr.l4',0)
					->get();			
				}

				if( $value['release_level']==2)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->where('pr.l1',1)		
					->where('pr.l2',-1)		
					->where('pr.l3',0)		
					->where('pr.l4',0)
					->get();			
				}

				if( $value['release_level']==3)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
					->where('pr.l1',1)		
					->where('pr.l2',1)		
					->where('pr.l3',-1)		
					->where('pr.l4',0)
					->get();			
				}
				if($value['release_level']==4)
				{
					$approvePr = Releases::leftJoin('pr', 'pr.release_id', '=', 'releases.release_id')
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

}