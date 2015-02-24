<?php

class PagesController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Page Controller
	|--------------------------------------------------------------------------
	*/

	public function home()
	{
    $photos = Photo::where('deleted', '=', '0')->orderByRaw("RAND()")->take(120)->get();
		return View::make('index', ['photos' => $photos]);
	}
  
  public function panel()
	{
    $photos = Photo::where('deleted', '=', '0')->orderByRaw("RAND()")->take(120)->get();
		return View::make('api.panel', ['photos' => $photos]);
	}
	
	public function search()
	{
    $needle = Input::get("q");
		$tags = Tag::where('name', 'LIKE', '%' . $needle . '%')->get();
		// se houver uma tag exatamente como a busca, pegar todas as fotos dessa tag e juntar no painel
		$tag = Tag::where('name', '=', $needle)->get();
		if ($tag) {
			// $byTag = $tag->photos;
		}

      $photos = Photo::where('deleted', '=', '0')
      			->where(function ($query) use($needle) {
      				$query->where('name', 'LIKE', '%' . $needle . '%')
      				->orWhere('description', 'LIKE', '%' . $needle . '%')
      				->orWhere('imageAuthor', 'LIKE', '%' . $needle . '%')
					->orWhere('workAuthor', 'LIKE', '%' . $needle . '%')
			    	->orWhere('state', 'LIKE', '%' . $needle . '%')
			    	->orWhere('city', 'LIKE', '%' . $needle . '%');
      			})
      			->get();
		// $photos = $photos->merge($byTag);
    
    return View::make('/search',['tags' => $tags, 'photos' => $photos, 'query'=>$needle]);
	}

}
