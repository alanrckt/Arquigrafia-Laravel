<?php

class Phone extends Eloquent implements UserInterface, RemindableInterface {

    public function teste()
    {
    	return $this->belongsTo('Teste');
    }
	
}