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
		$photos = Photo::where('name', 'LIKE', '%' . $needle . '%')
      ->orWhere('deleted', '=', '0')
      ->orWhere('description', 'LIKE', '%' . $needle . '%')
      ->orWhere('imageAuthor', 'LIKE', '%' . $needle . '%')
      ->orWhere('state', 'LIKE', '%' . $needle . '%')
      ->orWhere('city', 'LIKE', '%' . $needle . '%')
      ->take(20)
      ->get();
    return View::make('/search',['photos' => $photos, 'query'=>$needle]);
	}
}
