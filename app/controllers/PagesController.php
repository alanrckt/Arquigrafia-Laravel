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
    // $photos = Photo::orderByRaw("RAND()")->take(120)->get();
		return View::make('index', ['photos' => $photos]);
	}
  
  public function panel()
	{
    $photos = Photo::where('deleted', '=', '0')->orderByRaw("RAND()")->take(120)->get();
    // $photos = Photo::orderByRaw("RAND()")->take(120)->get();
		return View::make('api.panel', ['photos' => $photos]);
	}
	
	public function search()
	{
    $needle = Input::get("q");
		if ($needle != "") {
      $tags = Tag::where('name', 'LIKE', '%' . $needle . '%')->get();
      // photos
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
      
      // $photos = Photo::where('name', 'LIKE', '%' . $needle . '%')
      //         ->orWhere('description', 'LIKE', '%' . $needle . '%')
      //         ->orWhere('imageAuthor', 'LIKE', '%' . $needle . '%')
      //         ->orWhere('workAuthor', 'LIKE', '%' . $needle . '%')
      //         ->orWhere('state', 'LIKE', '%' . $needle . '%')
      //         ->orWhere('city', 'LIKE', '%' . $needle . '%')
      //         ->get();
      
      // se houver uma tag exatamente como a busca, pegar todas as fotos dessa tag e juntar no painel
      $tag = Tag::where('name', '=', $needle)->get();
      if ($tag->first()) {
        $byTag = $tag->first()->photos;
        $photos = $photos->merge($byTag);
      }
      // retorna resultado da busca
      return View::make('/search',['tags' => $tags, 'photos' => $photos, 'query'=>$needle]);
    } else {
      // busca vazia
      return View::make('/search',['tags' => [], 'photos' => [], 'query' => ""]);
    }
	}
  
  public function advancedSearch()
	{
    
    $fields = array(
        'name',
        'description',
        'city',
        'state',
        'country'
    );
    
    foreach($fields as $field) $$field = Input::get($field);
    
    if(empty($name) && empty($description) && empty($city) && empty($state) && empty($country)) {
       // busca vazia
       return View::make('/advanced-search',['tags' => [], 'photos' => [], 'query' => ""]);
    } else {
      
      $query = Photo::where('id', '>', 0);
      
      if ($name != '') $query->where('name', 'LIKE', '%'. $name .'%');  
      if ($description != '') $query->where('description', 'LIKE', '%'. $description .'%');  
      if ($city != '') $query->where('city', 'LIKE', '%'. $city .'%');  
      if ($state != '') $query->where('state', 'LIKE', '%'. $state .'%'); 
      if ($country != '') $query->where('country', 'LIKE', '%'. $country .'%');  
      
      $photos = $query->get();
      
    }
    if($photos->count()) {
      // retorna resultado da busca
      return View::make('/advanced-search',['tags' => [], 'photos' => $photos]);
    } else {
      // busca sem resultados
      return View::make('/advanced-search',['tags' => [], 'photos' => []]);
    }
    
	}

}
