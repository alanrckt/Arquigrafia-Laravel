<?php

class Comment extends Eloquent {
  
  protected $fillable = ['text', 'user_id', 'photo_id'];

	public function photo() 
  {
		 return $this->belongsTo('Photo');
	}
  
  public function user()
  {
    return $this->belongsTo('User'); 
  }
}