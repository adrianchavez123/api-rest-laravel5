<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserAddressRequest;

class UserAddressController extends Controller {

	public function index($user_id)
	{
		$addresses =  \App\Models\Address::whereUserId($user_id)->get();
		
		return response()->json([
			'msg'			=>		'success',
			'addresses'		=> 		$addresses->toArray()
			],200);
	}

	

	public function store(UserAddressRequest $request,$user_id)
	{
		$address = new \App\Models\Address();
		
		$address->street = $request->street;
		$address->number = $request->number;
		$address->colony = $request->colony;
		$address->zip = $request->zip;
		$address->city = $request->city;
		$address->state = $request->state;
		$address->user_id = $user_id;
		
		
		if($address->save())
		{
			return response()->json([
			'msg'		=>		'success'
			],201);
		}
		else
		{
			return response()->json([
			'msg'		=>		'error',
			'error'		=>		'cannot create record'
			],400);
		}
	}

	
	public function show($user_id,$id)
	{
		$address = \App\Models\Address::find($id)->whereUserId($user_id)->first();
		return response()->json([
			'msg'			=>		'success',
			'address'		=> 		$address->toArray()
			],200);
	}

	//public function update(UserAddressRequest $request,$user_id,$id)
	public function update(Request $request,$user_id,$id)
	
	{
		$address = \App\Models\Address::find($id)->whereUserId($user_id)->first();
		
		$address->street = $request->street;
		$address->number = $request->number;
		$address->colony = $request->colony;
		$address->zip = $request->zip;
		$address->city = $request->city;
		$address->state = $request->state;
		
		if($address->save())
		{
			return response()->json([
			'msg'		=>		'success'
			],204);
		}
		else
		{
			return response()->json([
			'msg'		=>		'error',
			'error'		=>		'cannot update record'
			],400);
		}
	}

	public function destroy($user_id,$id)
	{
		$address = \App\Models\Address::find($id)->whereUserId($user_id)->first();
		if($address->delete())
		{
			return response()->json([
			'msg'		=>		'success'
			],204);
		}
		else
		{
			return response()->json([
			'msg'		=>		'error',
			'error'		=>		'cannot update record'
			],400);
		}
	}

}
