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
		$photos = Auth::user()->photos;
		return View::make('albums.form')->with('photos', $photos);
	}

	public function show($id) {
		$album = Album::find($id);
		if ( isset($album) ) {
			$photos = $album->photos;
			$user = $album->user;
			$edit = false;
			if ( Auth::check() && $user->id == Auth::id() )
				$edit = true;
			
			return View::make('albums.show')
				->with(['photos' => $photos, 'album' => $album, 'user' => $user]);
			
		}
		return Redirect::to('/');
	}
	
	public function store() {
		$input = Input::only('title', 'description');
		$photos = Input::except('title', 'description', '_token');

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
			$album->photos()->sync($photos);
			return Redirect::to('/albums/' . $album->id);
		}
	}
	
	public function delete($id) {
		
		$album = Album::whereid($id)->first();
		$logged_user = Auth::user();
		if ( isset($album) && $logged_user->id == $album->user_id)
		{
			$title = $album->title;
			$album->photos()->detach();
			$album->delete();
			Session::put('album.delete', 'Álbum ' . $title . ' deletado com sucesso.');
		}
		return Redirect::to('albums');
	}

	public function edit($id) {
		$user = Auth::user();
		$album = Album::find($id);

		if ($user->id != $album->user_id) 
			return Redirect::to('/');

		$album_photos = $album->photos;
		$all_photos = $user->photos;
		$other_photos = $all_photos->except($album_photos->modelKeys());
		return View::make('albums.edit')
			->with( ['album' => $album, 'album_photos' => $album_photos] );
	}

	public function removePhotos($id) {
		$album = Album::find($id);
		$photos = input::except('_token');
		$album->detach($photos);
		return Redirect::to('albums/' . $id);
	}

	public function insertPhotos($id) {
		$album = Album::find($id);
		$photos = input::except('_token');
		$album->attach($photos);
		return Redirect::to('albums/' . $id);
	}

	public function update($id) {
		$album = Album::find($id);
		$input = Input::all();
		$album->title = $input['title'];
		$album->description = $input['description'];
	}
	
}
