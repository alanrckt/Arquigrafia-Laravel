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
		$url = URL::to('/albums/photos/add');
		$photos = Photo::paginateUserPhotos(Auth::user(), 24);
		$maxPage = $photos->getLastPage();
		return View::make('albums.form')
			->with(['photos' => $photos, 
				'url' => $url, 
				'maxPage' => $maxPage, 
				'page' => 1,
				'type' => 'add'
			]);
	}

	public function show($id) {
		$album = Album::find($id);
		if ( isset($album) ) {
			$photos = $album->photos;
			$user = $album->user;
			$edit = false;
			$other_albums = $user->albums->except($album->id);
			if ( Auth::check() && $user->id == Auth::id() )
				$edit = true;
			return View::make('albums.show')
				->with(['photos' => $photos, 'album' => $album, 
					'user' => $user,
					'other_albums' => $other_albums]);
			
		}
		return Redirect::to('/');
	}
	
	public function store() {
		$input = Input::only('title', 'description');
		$photos = Input::get('photos_add');
		$cover_id = (empty($photos) ? null : array_values($photos)[0]);
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
					'user_id' => Auth::id(),
					'cover_id' => $cover_id
				]);
			if (!empty($photos))
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
				
		$album_photos = Photo::paginateAlbumPhotos($album);
		$other_photos = Photo::paginateOtherPhotos($user, $album->photos);
		$maxPage = $other_photos->getLastPage();
		$rmMaxPage = $album_photos->getLastPage();
		$url = URL::to('/albums/' . $album->id . '/photos/add');
		$rmUrl = URL::to('/albums/' . $album->id . '/photos/rm');
		return View::make('albums.edit')
			->with(
				['album' => $album, 
				'album_photos' => $album_photos, 
				'other_photos' => $other_photos,
				'page' => 1,
				'maxPage' => $maxPage,
				'rmMaxPage' => $rmMaxPage,
				'url' => $url,
				'rmUrl' => $rmUrl,
				'type' => 'rm',
				'photos' => null] );
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
		$input = Input::only('title', 'description');
		$rules = array('title' => 'required');
		$validator = Validator::make($input, $rules);
	
		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::to('/albums/' . $id . '/edit')->withErrors($messages);
		} else {
			$photos_add = Input::get('photos_add');
			$photos_rm = Input::get('photos_rm');
			$album->title = $input['title'];
			$album->description = $input['description'];
			if (!isset($album->cover_id)) {
				if (!empty($photos_add))
					$album->cover_id;
				
				$album->cover_id = $photos_add[0];
			}
			$album->save();
			if ( !empty($photos_add) )
				$album->photos()->sync($photos_add, false);
			if ( !empty($photos_rm) )
				$album->photos()->detach($photos_rm);
			return Redirect::to('/albums/' . $album->id);
		}
	}

	public function paginateByUser() {
		$photos = Photo::paginateUserPhotos(Auth::user());
		$page = $photos->getCurrentPage();
		return Response::json(View::make('albums.includes.album-photos')
			->with(['photos' => $photos, 'page' => $page, 'type' => 'add'])
			->render());
	}

	public function paginateByAlbum($id) {
		$album = Album::find($id);
		$photos = Photo::paginateAlbumPhotos($album);
		$page = $photos->getCurrentPage();
		return Response::json(View::make('albums.includes.album-photos')
			->with(['photos' => $photos, 'page' => $page, 'type' => 'rm'])
			->render());
	}

	public function paginateByOtherPhotos($id) {
		$album = Album::find($id);
		$photos = Photo::paginateOtherPhotos(Auth::user(), $album->photos);
		$page = $photos->getCurrentPage();
		return Response::json(View::make('albums.includes.album-photos')
			->with(['photos' => $photos, 'page' => $page, 'type' => 'add'])
			->render());
	}

	public function getList($id) {
		$photo_albums_ids = Photo::find($id)->albums->modelKeys(); // albums que já têm essa foto
		$albums = Album::where('user_id', '=', Auth::id())
			->whereNotIn('id', $photo_albums_ids)->get();
		return Response::json(View::make('albums.get-albums')
			->with(['albums' => $albums, 'photo_id' => $id])
			->render());
	}
	
	public function addPhotoToAlbums() {
		$albums_id = Input::get('albums');
		$photo = Input::get('_photo');
		$albums = Album::findMany($albums_id);
		
		foreach ($albums as $album)
		{	
			$album->photos()->sync(array($photo), false);
			if (!isset($album->cover_id)) {
				$album->cover_id = $photo;
			}
		}
		
		return Redirect::to('/photos/' . $photo);
	}

	public function destroy($id) {
		$album = Album::find($id);
		$album->photos()->detach();
		$album->delete();
		return Redirect::to('/albums');
	}

}
