<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
	protected $table= 'product';
	public $timestamps = true;

	protected $fillable = ['code','price','amount','description','name','category_id'];
	protected $hidden = [];

	public function category()
	{
		return $this->hasMany('App\Models\Category');
	}

	public function saleInfo()
	{
		return $this->belongsTo('App\Models\SaleInfo');
	}
}