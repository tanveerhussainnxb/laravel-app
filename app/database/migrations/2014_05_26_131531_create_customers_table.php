<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			//
			$table->increments('id');
			$table->string('name', 255);
			$table->string('email', 255);
			$table->string('address', 255);
			$table->string('city', 255);
			$table->string('state', 255);
			$table->string('country', 255);
			$table->integer('customer_level');
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
		Schema::drop('customers');
	}

}
