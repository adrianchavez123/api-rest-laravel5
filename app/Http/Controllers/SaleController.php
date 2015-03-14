<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SaleController extends Controller {

	public function index()
	{
		$sales = \App\Models\Sale::get();
		return response()->json([
			'msg'		=>		'success',
			'sales'		=> 		$sales->toArray()
			],200);	
	}
	
	public function show($id)
	{
		//edit to show user
		$sale = \App\Models\Sale::findOrFail($id);
		return response()->json([
			'msg'		=>		'success',
			'sale'		=> 		$sale->toArray()
			],200);	
	}

	public function update(Request $request,$id)
	{
		$sale = \App\Models\Sale::findOrFail($id);
		$sale->sale_number 	= $request->sale_number;
		$sale->total 		= $request->total;
		
		
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

	public function destroy($id)
	{
		$sale = \App\Models\Sale::findOrFail($id);
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
