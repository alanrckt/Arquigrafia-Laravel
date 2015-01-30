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
			// $table->string('firstDescription')->nullable(); não são necessários
			// $table->string('firstLink')->nullable(); não são necessários
			//$table->string('firstName')->nullable(); renomeado para firstOption
			$table->string('firstOption')->nullable();
			// $table->string('secondDescription')->nullable(); não são necessários
			// $table->string('secondLink')->nullable(); não são necessários
			// $table->string('secondName')->nullable(); renomeado para secondOption
			$table->string('secondOption')->nullable();
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
