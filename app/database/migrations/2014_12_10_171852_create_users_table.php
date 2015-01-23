<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigIncrements('id');
      $table->string('name');
      $table->string('login');
      $table->enum('gender',['male','female']);
      $table->string('email')->unique();
      $table->string('password');
      $table->string('country');
      $table->string('state');
      $table->string('city');
      $table->string('address');
      $table->string('birthday')->nullable();
      $table->string('company')->nullable();
      $table->string('title');
      $table->string('occupation')->nullable();
      $table->string('profession');
      $table->string('relationship')->nullable();
      $table->string('scholarity')->nullable();
      $table->string('language')->nullable();
      $table->string('photo')->;
      $table->string('phone')->;
      $table->string('site')->nullable();
      $table->string('id_facebook')->nullable();
      $table->string('id_foursquare')->nullable();
      $table->string('id_instagram')->nullable();
      $table->string('id_twitter')->nullable();
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
		Schema::table('users', function(Blueprint $table)
		{
			Schema::drop('users');
		});
	}

}
