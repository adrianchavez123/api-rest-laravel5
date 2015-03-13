<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
class UserController extends Controller {

	public function index()
	{
		$users = \App\User::get();
		return response()->json([
			'msg'		=>		'success',
			'users'		=> 		$users->toArray()
			],200);
	}

	public function store(UserRequest $request)
	{

		$user = new \App\User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = \Hash::make($request->password);

		if($user->save())
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
		$user = \App\User::findOrFail($id);
		return response()->json([
			'msg'		=>		'success',
			'user'		=> 		$user->toArray()
			],200);
	}

	

	public function update(Request $request, $id)
	{
		/*$this->validate($request, [
        	'name' => 'required|',
        	'email' => 'required|email',
        	'password' => 'required|min:4'
        	
    	]);*/
		
		$user = \App\User::find($id);
		$user->name= $request->name;
		$user->email = $request->email;
		$user->password = \Hash::make($request->password);
		if($user->save())
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
		$user = \App\User::findOrFail($id);
		if($user->delete())
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
