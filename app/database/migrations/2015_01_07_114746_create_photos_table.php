<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('aditionalImageComments')->nullable();
			$table->string('allowCommercialUses')->nullable();
			$table->string('allowModifications')->nullable();
			$table->string('cataloguingTime')->nullable();
			$table->string('characterization')->nullable();
			$table->string('city')->nullable();
			$table->string('collection')->nullable();
			$table->string('country')->nullable();
			$table->string('dataCriacao')->nullable();
			$table->dateTime('dataUpload')->nullable();
			$table->boolean('deleted')->default(false);
			$table->string('description')->nullable();
			$table->string('district')->nullable();
			// fotografo
			$table->string('imageAuthor')->nullable();
			$table->string('name');
			$table->string('nome_arquivo');
			$table->string('state')->nullable();
			$table->string('street')->nullable();
			$table->string('tombo')->nullable();
			// arquiteto
			$table->string('workAuthor')->nullable();
			$table->string('workdate')->nullable();
			// que subiu
			$table->bigInteger('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('photos');
	}

}
