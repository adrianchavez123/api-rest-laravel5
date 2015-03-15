<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SaleController extends Controller {

	public function index()
	{
		$sales = \DB::table('sales')
			->select('sales.id','users.name','email','total','sales.created_at','sales.updated_at')
			->join('users','sales.user_id','=','users.id')
			->get();

		return response()->json([
			'msg'		=>		'success',
			'sales'		=> 		$sales
			],200);	
	}
	
	public function show($id)
	{
		$sale = \DB::table('sales')
			->select('users.name','email','code','price','products.name','description','sales_info.amount','total')
			->join('sales_info','sales_info.sale_id','=','sales.id')
			->join('products','sales_info.product_id','=','products.id')
			->join('users','sales.user_id','=','users.id')
			->where('sales.id','=',$id)
			->get();
		return response()->json([
			'msg'		=>		'success',
			'sale'		=> 		$sale
			],200);	
	}

	

}
