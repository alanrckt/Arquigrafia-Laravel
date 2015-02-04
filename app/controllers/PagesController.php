<?php

class PagesController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Page Controller
	|--------------------------------------------------------------------------
	*/

	public function home()
	{
    $photos = Photo::where('deleted', '=', '0')->take(20)->get();
		return View::make('index', ['photos' => $photos]);
	}

}
