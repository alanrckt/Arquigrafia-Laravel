<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('address')->nullable();
			$table->string('birthday')->nullable();
			$table->string('city')->nullable();
			$table->string('company')->nullable();
			$table->string('country')->nullable();
			$table->string('course')->nullable();
			$table->string('gender')->nullable();
			$table->string('institution')->nullable();
			$table->string('nativeLanguage')->nullable();
			$table->string('occupation')->nullable();
			$table->string('phone')->nullable();
			$table->string('profession')->nullable();
			$table->string('relationship')->nullable();
			$table->string('scholarity')->nullable();
			$table->string('secondName')->nullable();
			$table->string('stateOrProvince')->nullable();
			$table->string('webPage')->nullable();
			$table->bigInteger('user_id')->nullable()->unsigned();
			$table->foreign('user_id')->references('id')->on('user');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profile');
	}

}
