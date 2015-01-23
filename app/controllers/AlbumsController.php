<?php

class AlbumsController extends \BaseController {

	public function index()
	{
		$users = User::all();

		  return View::make('/albums.index',['users' => $users]);
	}

	public function show($id)
	{
		$user = User::whereid($id)->first();
		$album = Photo::whereid($id)->first();

		return View::make('/albums.show',['users' => $user,'album' => $album]);
	}
}
