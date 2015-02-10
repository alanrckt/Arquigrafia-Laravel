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
	
  // upload form
	public function form()
  {
		// show form view
    return View::make('/photos/form');
	}
	
	// create photo 
  public function store()
  {
    if (Input::get("step")=="1") {
		  if (Input::file('photo')->isValid()) {
        // TODO validate image upload
        $photo = Photo::create([
          'user_id'=>Auth::user()->id,
          'name'=>'LOCK', 'description'=>'LOCK', 
          'nome_arquivo'=>'LOCK'
        ]);
        // save on database
        $photo->save();
        // save copies
        Image::make(Input::file('photo'))->encode('jpg', 80)->save(public_path().'/uploads/'.$photo->id.".jpg"); // original
        Image::make(Input::file('photo'))->encode('jpg', 80)->fit(600,600)->save(public_path().'/uploads/'.$photo->id.'_view.jpg');
        // $image = Image::make(Input::file('photo'))->resize(600, 600)->save( $photo->id.'_view.jpg' );
        // return to complete metadata
        return View::make('/photos/form',['photo'=>$photo]);
      } else {
        print_r(Input::all());
      }
    } else {
      // update metadata
    }
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
