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
		$sale->total 		= $request->total;
		$sale->user_id 		= $user_id;
		
		
		if($sale->save())
		{
			//['product_id','sale_id','amount'];
			for($i = 0; $i < sizeof($request->products);$i++)
			{
				$sale_info = new \App\Models\SaleInfo();
				$sale_info->product_id 	= $request->products[$i];
				$sale_info->sale_id 	= $sale_id;
				$sale_info->amount 		= $request->amounts[$i];
				$sale_info->save();
			}
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
		//$sale = \App\Models\Sale::find($id)->where('user_id','=',$user_id)->first();
		$sale = \DB::table('sales')
			->select('code','price','name','description','sales_info.amount','total')
			->join('sales_info','sales_info.sale_id','=','sales.id')
			->join('products','sales_info.product_id','=','products.id')
			->where('sales.id','=',$id)
			->get();
		if(is_null($sale))
		{
			return response()->json([
			'msg'			=>		'success',
			'sale'		=> 		'sale not found'
			],404);
		}
		return response()->json([
			'msg'			=>		'success',
			'sale'		=> 		$sale
			],200);
	}

	

}
