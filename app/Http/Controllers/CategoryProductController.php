<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryProductRequest;
class CategoryProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($category_id)
	{
		$products =  \App\Models\Product::whereCategoryId($category_id)->get();
		
		return response()->json([
			'msg'			=>		'success',
			'products'			=> 		$products->toArray()
			],200);
	}

	public function store(CategoryProductRequest $request,$category_id)
	{
		$product = new \App\Models\Product();
		$product->code 			= $request->code;
		$product->amount 		= $request->amount;
		$product->description 	= $request->description;
		$product->name 			= $request->name;
		$product->category_id 	= $category_id;
		
		if($product->save())
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

	public function show($category_id,$id)
	{
		$product = \App\Models\Product::find($id)->whereCategoryId($category_id)->first();
		
		if(is_null($product))
		{
			return response()->json([
			'msg'		=>		'success',
			'product'		=> 		'product not found'
			],404);
		}

		return response()->json([
			'msg'			=>		'success',
			'sale'		=> 		$product->toArray()
			],200);
	}

	public function update(Request $request,$category_id,$id)
	{
		$product = \App\Models\Product::find($id)->whereCategoryId($category_id)->first();
		if(is_null($product))
		{
			return response()->json([
			'msg'		=>		'success',
			'product'		=> 		'product not found'
			],404);
		}

		$product->code 			= $request->code;
		$product->amount 		= $request->amount;
		$product->description 	= $request->description;
		$product->name 			= $request->name;
		
		if($product->save())
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

	
	public function destroy($category_id,$id)
	{
		$product = \App\Models\Product::find($id)->whereCategoryId($category_id)->first();
		if(is_null($product))
		{
			return response()->json([
			'msg'		=>		'success',
			'product'		=> 		'product not found'
			],404);
		}
		
		if($product->delete())
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
