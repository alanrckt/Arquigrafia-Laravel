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
      $table->string('lastName');
      $table->string('login');
      $table->enum('gender',['male','female']);
      $table->string('email')->unique();
      $table->string('password');
      $table->string('country')->nullable();
      $table->string('state')->nullable();
      $table->string('city')->nullable();
      $table->string('address')->nullable();
      $table->string('birthday')->nullable();
      // $table->string('company')->nullable();
      $table->string('title')->nullable();
      $table->string('occupation')->nullable();
      $table->string('scholarity')->nullable();
      $table->string('profession')->nullable();
      // $table->string('relationship')->nullable();
      $table->string('language')->nullable();
      $table->string('photo')->nullable();
      $table->string('phone')->nullable();
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
