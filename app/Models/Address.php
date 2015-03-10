<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model  {

	protected $table = 'address';
	public $timestamps = true;

	protected $fillable = ['street', 'number', 'colony','zip','city','state','user_id'];
	protected $hidden = [];

	public function user()
	{
	return $this->belongsTo('App\User');
	}
}