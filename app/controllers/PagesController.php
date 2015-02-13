<?php

class PagesController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Page Controller
	|--------------------------------------------------------------------------
	*/

	public function home()
	{
    $photos = Photo::where('deleted', '=', '0')->orderByRaw("RAND()")->take(50)->get();
		return View::make('index', ['photos' => $photos]);
	}
  
  public function panel()
	{
    $photos = Photo::where('deleted', '=', '0')->orderByRaw("RAND()")->take(50)->get();
		return View::make('api.panel', ['photos' => $photos]);
	}

}
