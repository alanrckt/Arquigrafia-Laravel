<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('email')->nullable();
 			$table->string('encryptedPassword')->nullable();
			$table->string('login')->unique()->nullable();
			$table->string('name')->nullable();
			$table->string('photoURL')->nullable();
			$table->integer('type')->nullable();
			$table->boolean('statusToken');
			$table->string('token')->nullable();
			$table->dateTime('updateAt')->nullable();
			$table->dateTime('creationDate')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
