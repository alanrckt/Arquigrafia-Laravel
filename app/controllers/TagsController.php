<?php

class TagsController extends \BaseController {

	public function index()
	{
		$tags = Tag::all();
		return $tags;
	}

}
