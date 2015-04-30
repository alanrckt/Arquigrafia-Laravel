<?php

class Binomial extends Eloquent {

	protected $fillable = ['firstOption','secondOption'];

	public $timestamps = false;

	public function evaluations()
	{
		return $this->hasMany('Evaluation');
	}

}