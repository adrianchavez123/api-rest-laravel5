<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('addresses',function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('street',50);
			$table->string('number',10);
			$table->string('colony',50);
			$table->string('zip',10);
			$table->string('city',100);
			$table->string('state',100);
			$table->integer('user_id')->unsigned()->references('id')->on('users');
			$table->timestamps();
			
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('addresses');
	}

}
