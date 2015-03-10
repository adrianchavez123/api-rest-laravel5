<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class SaleInfo extends Model
{
	protected $table = 'sales_info';
	public $timestamps = true;

	protected $fillable = ['product_id','sale_id','amount'];
	protected $hidden = [];

	public function product()
	{
		return $this->hasMany('App\Models\Product');
	}

	public function sale()
	{
		return $this->hasMany('App\Models\Sale');
	}
}