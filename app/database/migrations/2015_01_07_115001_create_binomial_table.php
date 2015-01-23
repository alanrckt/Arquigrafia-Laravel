<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinomialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('binomial', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->integer('defaultValue');
			$table->string('firstDescription')->nullable();
			$table->string('firstLink')->nullable();
			$table->string('firstName')->nullable();
			$table->string('secondDescription')->nullable();
			$table->string('secondLink')->nullable();
			$table->string('secondName')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('binomial');
	}

}
