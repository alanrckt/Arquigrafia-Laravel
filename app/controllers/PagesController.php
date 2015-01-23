<?php

class PagesController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Page Controller
	|--------------------------------------------------------------------------
	*/

	public function home()
	{
    $photos = Photo::all();
		return View::make('index', ['photos' => $photos]);
	}

}
