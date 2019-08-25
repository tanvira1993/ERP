<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Response;
use DB;
use Validator;

class UserCredentialController extends Controller
{
	public function saveUser (Request $request)
	{
		

		$rules = [
			'name' => 'required| min:3',
			'email' => 'required | email | unique:users,email',
			'mobile' => 'required | numeric',
			'role' => 'required | numeric',
			'position' => 'required',
			'password' => 'required | min:2',
			'repass' => 'required | same:password',

		];

		$messages = [
			'name.required' => 'Name is required!',
			'email.required' => 'Email is required!',
			'email.unique' => 'This Email already has taken.',
			'mobile.required' => 'Phone Number is required!',
			'role.required' => 'User Role is required!',
			'position.required' => 'Job Position is required!',
			'password.required'=> 'PassWord is required',
			'password.min' => 'password needs at least 2 character',
			'repass.required'=> 'ReEnter PassWord',
			'repass.same'=> 'PassWord Did not match',

		];

		$validation = Validator::make($request->all(), $rules, $messages);

        // redirect on validation error
		if ($validation->fails()) {
			$errorMsgString = implode("<br/>",$validation->messages()->all());
			return Response::json(array('success' => false, 'heading' => 'Validation Error', 'message' => $errorMsgString), 400);
		}

		DB::beginTransaction();

		try {

			$user = new User;
			$user->name = $request->name;
			$user->email = $request->email;
			$user->mobile = $request->mobile;
			$user->position = $request->position;		
			$user->password = Hash::make($request->password);
			$user->id_user_roles= $request->role;


			if($user->save()){
				DB::commit();
				return Response::json(array('success' => TRUE, 'data' => $user), 200);
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'User could can not be created!'), 400);

			}

		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'User could can not be created!'), 400);
		}
		

	}

	public function login (Request $request)
	{
		
		$credentials = [
			'email' => $request->email,
			'password' => $request->password
		];

		if (auth()->attempt($credentials)) {
			$token = auth()->user()->createToken('TutsForWeb')->accessToken;
			$userInfo= $request->user();
			
			return response()->json(['message'=>'Success','token' => $token, 'userInfo' => $userInfo], 200);
		} else {
			return response()->json(['heading' => 'Access Denied', 'message' => 'Invalid email or password'], 401);
		}	
	}
	public function changePassword(Request $request)
	{

		$rules = [
			'ppassword' => 'required',			
			'npassword' => 'required | min:5 | different:ppassword',
			'repass' => 'required | same:npassword',

		];

		$messages = [						
			'ppassword.required'=> 'Old PassWord is required',
			'npassword.required' => 'New PassWord is required',
			'npassword.different' => 'Can not Use old password',			
			'npassword.min' => 'New password needs at least 5 character',			
			'repass.required'=> 'ReEnter PassWord',
			'repass.same'=> 'Password Did not match',

		];

		$validation = Validator::make($request->all(), $rules, $messages);


		if ($validation->fails()) {
			$errorMsgString = implode("<br/>",$validation->messages()->all());
			return Response::json(array('success' => false, 'heading' => 'Validation Error', 'message' => $errorMsgString), 400);
		}


		DB::beginTransaction();

		try {
			$id=$request->header('idUser');
			$target = User::select('users.*')->where('user_id',$id)->first();
			
			if(Hash::check($request->ppassword, $target->password)){
				/*echo '<pre>';
				print_r($id);
				echo '</pre>';
				exit;*/

				$admin = User::find($id);
				$admin->password = Hash::make($request->npassword);

				if($admin->save()){
					DB::commit();
					return Response::json(array('success' => TRUE, 'data' => $admin), 200);
				}

				else{

					DB::rollback();
					return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Password can not be changed!'), 400);
				}
			}

			else{

				DB::rollback();
				return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Old Password are incorrect..!!'), 400);
			}		

		}
		
		catch (\Exception $e) {
			echo $e;
			DB::rollback();
			return Response::json(array('success' => FALSE, 'heading' => 'Insertion Failed', 'message' => 'Password can not be changed!'), 400);
		}
		
	}

	public function getUserIdById(Request $request)
	{
		$id=$request->header('idUser');		
		$usersInfo = User::select('users.*')->where('user_id',$id)->first();
		return Response::json(['success' => true, 'data' => $usersInfo], 200);
	}

}
