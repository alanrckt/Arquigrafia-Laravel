<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounterlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('counterlog', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->dateTime('accessDate')->nullable();
			$table->bigInteger('counter_id')->nullable()->unsigned();
			$table->bigInteger('user_id')->nullable()->unsigned();
			$table->foreign('counter_id')->references('id')->on('counter');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('counterlog');
	}

}
