<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('sales_info',function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned()->references('id')->on('products');
			$table->integer('sale_id')->unsigned()->references('id')->on('sales');
			$table->integer('amount');
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
		Schema::drop('sales_info');
	}

}
