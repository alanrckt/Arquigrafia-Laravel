<?php

class Binomial extends Eloquent {
  
	protected $fillable = ['firstOption','secondOption'];
  
	protected $table = 'binomial';
  
  public $timestamps = false;
  
  public function evaluations()
  {
    return $this->hasMany('Evaluation');
  }

}