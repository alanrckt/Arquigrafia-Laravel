<?php

class Binomial extends Eloquent {
  
	protected $fillable = ['firstOption','secondOption'];
  
	//protected $table = 'binomial';
  	// alterar tabela no banco para 'binomials'
  public $timestamps = false;
  
  public function evaluations()
  {
    return $this->hasMany('Evaluation');
  }
  

}