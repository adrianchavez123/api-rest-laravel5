<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('sales',function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('sale_number',50)->unique();
			$table->double('total');
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
		Schema::drop('sales');
	}

}
