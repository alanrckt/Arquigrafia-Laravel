<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('albums', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->dateTime('creationDate')->nullable();
			$table->string('description')->nullable();
			$table->string('title')->nullable();
			$table->string('urlCover')->nullable();
			$table->bigInteger('owner_id')->nullable()->unsigned();
			$table->foreign('owner_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('albums');
	}

}
