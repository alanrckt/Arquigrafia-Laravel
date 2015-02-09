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
	
	public function store()
  {
		// save image
	}
	
	// create photo 
  public function store()
  {
		// save image
	}
  
  public function search()
	{
    $needle = Input::get("q");
		$photos = Photo::orWhere('name', 'LIKE', '%' . $needle . '%')
      ->orWhere('description', 'LIKE', '%' . $needle . '%')
      ->orWhere('imageAuthor', 'LIKE', '%' . $needle . '%')
			->orWhere('workAuthor', 'LIKE', '%' . $needle . '%')
      ->orWhere('state', 'LIKE', '%' . $needle . '%')
      ->orWhere('city', 'LIKE', '%' . $needle . '%')
      ->where('deleted', '=', '0')
      ->get();
    return View::make('/search',['photos' => $photos, 'query'=>$needle]);
	}
}
