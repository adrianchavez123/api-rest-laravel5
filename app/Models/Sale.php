<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
	protected $table = 'sales';
	public $timestamps = true;

	protected $fillable = ['sale_number','total','user_id'];
	protected $hidden = [];

	public function user()
	{
		return $this->hasMany('App\User');
	}

	public function saleInfo()
	{
		return $this->belongsTo('App\Models\SaleInfo');
	}

}