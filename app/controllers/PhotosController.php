<?php

class PhotosController extends \BaseController {

	public function index()
	{
		$photos = Photo::where('deleted', '=', '0');
		return View::make('/photos.index',['photos' => $photos]);
	}

	public function show($id)
	{
		$photos = Photo::whereid($id)->first();
    return View::make('/photos.show',['photos' => $photos]);
	}
  
  public function search()
	{
    $needle = Input::get("q");
		$photos = Photo::where('name', 'LIKE', '%' . $needle . '%')->orWhere('description', 'LIKE', '%' . $needle . '%')->get();
    return View::make('/search',['photos' => $photos, 'query'=>$needle]);
	}
}
