<?php

class Photo extends Eloquent {
  
    protected $fillable = ['user_id','name', 'description', 'nome_arquivo','state','street', 'tombo', 'workAuthor', 'workdate', 'dataUpload', 'dataCriacao', 'country', 'collection', 'city'];

	static $allowModificationsList = [
    	'YES' => ['Sim', ''],
    	'YES_SA' => ['Sim, contanto que os outros compartilhem de forma semelhante', '-sa'],
    	'NO' => ['Não', '-nd']
    ]; 

    static $allowCommercialUsesList = [
    	'YES' => ['Sim', ''],
    	'NO' => ['Não', '-nc']
    ];

    public function user()
    {
    	return $this->belongsTo('User');
    }
	
}