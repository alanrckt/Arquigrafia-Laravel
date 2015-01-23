<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->dateTime('postDate')->nullable();
			$table->string('text')->nullable();
			$table->bigInteger('user_id')->nullable()->unsigned();
			$table->bigInteger('photo_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('user');
			$table->foreign('photo_id')->references('id')->on('photos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comment');
	}

}
