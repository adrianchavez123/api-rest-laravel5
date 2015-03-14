<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserSaleRequest;

class UserSaleController extends Controller {

	public function index($user_id)
	{
		$sales =  \App\Models\Sale::whereUserId($user_id)->get();
		
		return response()->json([
			'msg'			=>		'success',
			'sales'			=> 		$sales->toArray()
			],200);
	}

	
	public function store(UserSaleRequest $request,$user_id)
	{
		$sale = new \App\Models\Sale();
		//sale number then will be generate automatically just for now is send by the client
		$sale->sale_number 	= $request->sale_number;
		$sale->total 		= $request->total;
		$sale->user_id 		= $user_id;
		
		
		if($sale->save())
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
		$sale = \App\Models\Sale::find($id)->whereUserId($user_id)->first();
		return response()->json([
			'msg'			=>		'success',
			'sale'		=> 		$sale->toArray()
			],200);
	}

	//public function update(UserSaleRequest $request,$user_id,$id)
	public function update(Request $request,$user_id,$id)
	{
		$sale = \App\Models\Sale::find($id)->whereUserId($user_id)->first();
		$sale->sale_number 	= $request->sale_number;
		$sale->total 		= $request->total;
		$sale->user_id 		= $user_id;
		
		
		if($sale->save())
		{
			return response()->json([
			'msg'		=>		'success'
			],204);
		}
		else
		{
			return response()->json([
			'msg'		=>		'error',
			'error'		=>		'cannot create record'
			],400);
		}
	}

	
	public function destroy($user_id,$id)
	{
		$sale = \App\Models\Sale::find($id)->whereUserId($user_id)->first();
		
		if($sale->delete())
		{
			return response()->json([
			'msg'		=>		'success'
			],204);
		}
		else
		{
			return response()->json([
			'msg'		=>		'error',
			'error'		=>		'cannot create record'
			],400);
		}
	}

}
