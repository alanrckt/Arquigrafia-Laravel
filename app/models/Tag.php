<?php

class Tag extends Eloquent {

	protected $table = 'tag';

	public function photos() {
		return $this->belongsToMany('Photo', 'tag_assignments', 'tag_id', 'photo_id');
	}
}