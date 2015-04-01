<?php

class Evaluation extends Eloquent {
  
	protected $fillable = ['photo_id','evaluationPosition','binomial_id','user_id'];
  
	protected $table = 'binomial_evaluation';
  
  public $timestamps = false;
  
  public function binomial()
  {
    return $this->hasOne('Binomial');
  }
  
  public function photo()
  {
    return $this->hasOne('Photo');
  }

}