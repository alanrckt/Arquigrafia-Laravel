<?php

class Album extends Eloquent {
    
	public $timestamps = false;
    
    protected $fillable = ['creationDate', 'description', 'title', 'urlCover', 'user_id'];

	public function photos()
	{
		 return $this->belongsToMany('Photo', 'album_elements');
	}
    
    public function user()
    {
        return $this->belongsTo('User'); 
    }
}