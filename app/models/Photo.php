<?php

class Photo extends Eloquent {
  
    protected $fillable = ['user_id','name', 'description', 'nome_arquivo','state','street', 'tombo', 'workAuthor', 'workdate', 'dataUpload', 'dataCriacao', 'country', 'collection', 'city'];

    public function user()
    {
    	return $this->belongsTo('User');
    }
	
}