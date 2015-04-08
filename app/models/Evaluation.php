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

  public static function average($id) {
     return DB::table('binomial_evaluation')
      ->select('binomial_id', DB::raw('avg(evaluationPosition) as avgPosition'))
      ->where('photo_id', $id)
      ->orderBy('binomial_id', 'asc')
      ->groupBy('binomial_id')->get();
  }



}