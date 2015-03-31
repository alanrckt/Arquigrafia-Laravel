<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinomialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('binomials', function(Blueprint $table)
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
      
      /*
      valores para o arquigrafia
      id - def value - descricao - x - op1 - descricao - op2              
      
      (13,50,'predominantemente paralelo à linha do horizonte','','Horizontal','predominantemente perpendicular em relação ao plano do horizonte','','Vertical',5)
      (14,50,'tudo aquilo que permite a passagem de luz','','Translúcida','tudo aquilo que não reflete e/ou não permite a passagem de luz','','Opaca',5)
      (16,50,'que tem simetria; regular','','Simétrica','que não é simétrico; desigual','','Assimétrica',5)
      (19,50,'que contém muito elementos com diferentes formas de inter-relação','','Complexa','que se constitui de poucos ou apenas um único componente','','Simples',5)
      (20,50,'que fica do lado de dentro, no interior','','Interna','que fica do lado de fora, no exterior','','Externa',5)
      (21,50,'que permite que se acesse ou se enxergue outro lugar ou objeto',NULL,'Aberta','que impede a entrada, saída e visualização de outro lugar ou objeto',NULL,'Fechada',5)
      
      INSERT INTO `arquigrafia`.`binomial`
        (`id`, `defaultValue`, `firstOption`, `secondOption`)
      VALUES
        (13,50,'Horizontal','Vertical'),
        (14,50,'Translúcida','Opaca'),
        (16,50,'Simétrica','Assimétrica'),
        (19,50,'Complexa','Simples'),
        (20,50,'Interna','Externa'),
        (21,50,'Aberta','Fechada');
      */
      
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('binomials');
	}

}
