<?php

class PhotosController extends \BaseController {

	public function index()
	{
		$photos = Photo::all();
		return View::make('/photos.index',['photos' => $photos]);
	}

	public function show($id)
	{
		$photos = Photo::whereid($id)->first();
    return View::make('/photos.show',['photos' => $photos]);
	}
}
