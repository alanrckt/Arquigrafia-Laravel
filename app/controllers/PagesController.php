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
        'vehicle_manufacturer','vehicle_model',
        'year_reg_from','year_reg_to',
        'price_from','price_to'
    );

    foreach($fields as $field) $$field = Input::get($field);
    
    $query = Seller::where('vehicle_manufacturer', 'LIKE', '%'. $vehicle_manufacturer .'%')
            ->orWhere('vehicle_model', 'LIKE', '%'. $this->getModel($vehicle_model) .'%');      
            
    if(!empty($year_reg_from) && !empty($year_reg_to)) {
        $query->whereBetween('year_reg', array($year_reg_from, $year_reg_to));
    }
    if(!empty($price_from) && !empty($price_to)) {
        $query->whereBetween('price', array($price_from, $price_to));
    }
    if(empty($price_from) && empty($price_to) && empty($year_reg_from) && empty($year_reg_to)) {
        //Nothing yet
    }
     $result = $query->get();
    if($result->count()) {
        $data = array(
            'results'       => $result
        );
        return View::make('auto.vehicle.search')->with($data);
    }
    return Redirect::route('home')->with('global', 'No results.');
    
    // antigo
    
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
      // se houver uma tag exatamente como a busca, pegar todas as fotos dessa tag e juntar no painel
      $tag = Tag::where('name', '=', $needle)->get();
      if ($tag->first()) {
        $byTag = $tag->first()->photos;
        $photos = $photos->merge($byTag);
      }
      // retorna resultado da busca
      return View::make('/advanced-search',['tags' => $tags, 'photos' => $photos, 'query'=>$needle]);
    } else {
      // busca vazia
      return View::make('/advanced-search',['tags' => [], 'photos' => [], 'query' => ""]);
    }
    
	}

}
