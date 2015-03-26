<?php

class Occupation extends Eloquent {
    
	public $timestamps = false;
    
    protected $fillable = ['id', 'institution', 'occupation', 'user_id'];

	public function user()
    {
        return $this->belongsTo('User'); 
    }
}