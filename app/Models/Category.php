<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
	protected $table = 'categories';
	public $timestamps = true;

	protected $fillable = ['name'];
	protected $hidden = [];

	public function product()
	{
		return $this->belongsTo('App\Models\Product');
	}
}