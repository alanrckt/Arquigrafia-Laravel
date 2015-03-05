<?php

class AlbumsController extends \BaseController {

	public function __construct() {
		$this->beforeFilter('auth', 
			array( 'except' => 'show' ));
	}

	public function index() {
		$albums = Auth::user()->albums;
		return View::make('albums.index')->with('albums', $albums);
	}

	public function create() {
		return View::make('albums.form');
	}

	public function show($id) {
		$album = Album::find($id);
		if ( isset($album) ) {
			$photos = $album->photos;
			$user = $album->user;
			$edit = false;
			if ( Auth::check() && $user->id == Auth::id() )
				$edit = true;
			// var_dump($photos);
			// var_dump($user);
			 dd($edit);
		}
	}
	
	public function store() {
		$input = Input::all();
		
			// validate data
		$rules = array(
			'title' => 'required',
		);
		$validator = Validator::make($input, $rules);
	
		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::to('/albums/create')->withErrors($messages);
		} else {
			
			$album = Album::create([
					'title' => $input["title"],
					'description' => $input["description"],
					'creationDate' => date('Y-m-d H:i:s'),
					'user_id' => Auth::id()
				]);
			return Redirect::to('/albums/' . $album->id);
		}

	}
	
	public function destroy($id) {
		
		$album = Album::whereid($id)->first();
		$logged_user = Auth::user();
		if ($logged_user->id == $album->user_id)
		{
			$title = $album->title;
			$album->photos()->detach();
			$album->delete();
			Session::put('album.delete', 'Álbum ' . $title . 'deletado com sucesso.');
			return Redirect::to('albums.index');
		}
		return Redirect::to('/');
	}
	
}
