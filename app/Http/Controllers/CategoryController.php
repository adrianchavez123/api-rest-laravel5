<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller {

	public function index()
	{
		$categories = \App\Models\Category::get();
		return response()->json([
			'msg'				=>		'success',
			'categories'		=> 		$categories->toArray()
			],200);
	}

	
	public function store(CategoryRequest $request)
	{
		$category = new \App\Models\Category();
		$category->name = $request->name;
		if($category->save())
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

	public function show($id)
	{
		$category = \App\Models\Category::findOrFail($id);

		return response()->json([
				'msg'		=>		'success',
				'category'	=>		$category->toArray()
			],200);
	}
	//public function update(CategoryRequest $request,$id)
	public function update(Request $request,$id)
	{
		$category = \App\Models\Category::findOrFail($id);
		$category->name = $request->name;
		if($category->save())
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

	public function destroy($id)
	{
		$category = \App\Models\Category::findOrFail($id);
		if($category->delete())
		{
			return response()->json([
			'msg'		=>		'success'
			],204);
		}
		else
		{
			return response()->json([
			'msg'		=>		'error',
			'error'		=>		'cannot delete record'
			],400);
		}
	}

}
