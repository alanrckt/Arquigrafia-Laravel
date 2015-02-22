<?php

class PhotosController extends \BaseController {

	public function index()
	{
		$photos = Photo::where('deleted', '=', '0');
		return View::make('/photos/index',['photos' => $photos]);
	}

	public function show($id)
	{
		$photos = Photo::whereid($id)->first();
    $user = User::find($photos->user_id);
    $tags = $photos->tags;
    if (Auth::check()) {
      if (Auth::user()->following->contains($user->id))
        $follow = false;
      else 
        $follow = true;
    } else {
      $follow = true;
    }
    return View::make('/photos/show',
      ['photos' => $photos, 'owner' => $user, 'follow' => $follow, 'tags' => $tags]);
	}
	
  // upload form
	public function form()
  {
		// show form view
    if (Auth::check()) return View::make('/photos/form'); else return View::make('/users/login');
	}
	
	// create photo 
  public function store()
  {
    if (Input::file('photo')->isValid()) {
      // TODO validate image upload
      // save on database
      $photo = Photo::create([
        'user_id'=>Auth::user()->id,
        'name'=>'LOCK', 
        'description'=>'LOCK', 
        'nome_arquivo'=> 'LOCK',
        // iniciar a foto inativa
        'deleted' => 1
      ]);
      // save copies
      $file = Input::file('photo');
      $ext = $file->getClientOriginalExtension();
      $photo->nome_arquivo = $photo->id.".".$ext;
      $photo->save();
      Image::make(Input::file('photo'))->encode('jpg', 80)->heighten(220)->save(public_path().'/arquigrafia-images/'.$photo->id.'_200h.jpg');
      Image::make(Input::file('photo'))->encode('jpg', 80)->widen(600)->save(public_path().'/arquigrafia-images/'.$photo->id.'_view.jpg');
      $file->move(public_path().'/arquigrafia-images', $photo->id."_original.".strtolower($ext)); // original
      // return to complete metadata
      return View::make('/photos/form',['photo'=>$photo]);
    } else {
      print_r(Input::all());
    }
	}
  
  // update meta
  public function update()
	{
    $input = Input::all();
    $photo = Photo::find($input["id"]);
    $photo->update([
      // "aditionalImageComments" => $input["photo_aditionalImageComments"],
      "allowCommercialUses" => $input["photo_allowCommercialUses"],
      "allowModifications" => $input["photo_allowModifications"],
      // "cataloguingTime" => $input["photo_cataloguingTime"],
      // "characterization" => $input["photo_characterization"],
      "city" => $input["photo_city"],
      // "collection" => $input["photo_collection"],
      "country" => $input["photo_country"],
      // "dataCriacao" => $input["photo_dataCriacao"],
      "description" => $input["photo_description"],
      "district" => $input["photo_district"],
      "imageAuthor" => $input["photo_imageAuthor"],
      "name" => $input["photo_name"],
      "state" => $input["photo_state"],
      "street" => $input["photo_street"],
      // "tombo" => $input["photo_tombo"],
      // "workAuthor" => $input["photo_workAuthor"],
      "workdate" => $input["photo_workDate"],
      "street" => $input["photo_street"],
      // atualizar estado para ativa
      "deleted"=>false
    ]);
    
    $input["tags"] = str_replace(array('\'', '"', '[', ']'), '', $input["tags"]); 
    $tags = preg_split("/[\s,]+/", $input["tags"]);
    
    if (!empty($tags)) {
      $tags = array_map('trim', $tags);
      $tags = array_map('strtolower', $tags);
      // tudo em minusculas, para remover redundancias, como Casa/casa/CASA
      $tags = array_unique($tags); //retira tags repetidas, se houver.
      foreach ($tags as $t) {
        //$tag = new Tag( ['name'=> $t] );
        $tag = Tag::firstOrCreate(['name' => $t]); //não deveria haver tags repetidas no banco
        $photo->tags()->attach($tag->id);
        if ($tag->count == null)
          $tag->count = 0;
        $tag->count++;
        $tag->save();
      }
    }

    
    $photo->save();
    
    $user = User::find($photo->user_id);
    return Redirect::to("/photos/{$photo->id}");
    // return View::make('/photos/show',['photos' => $photo, 'owner' => $user]);
  }
  
  // ORIGINAL
  public function download($id)
  {
    if (Auth::check()) {
      $path = public_path().'/arquigrafia-images/'.$id.'_original.jpg';
      if( File::exists($path) ) {
        header('Content-Description: File Transfer');
        header("Content-Disposition: attachment; filename=\"".$id . '_original.jpg'."\"");
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: binary");
        header("Cache-Control: public");
        readfile($path);
        exit;
      }
      return "Arquivo original não encontrado.";
    } else {
      return "Você só pode fazer o download se estiver logado, caso tenha usuário e senha, faça novamente o login.";
    }
  }
  
  // COMMENT
  public function comment($id)
  {
    $input = Input::all();
    $rules = ['text' => 'required'];
    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
      $messages = $validator->messages();
      return Redirect::to("/photos/{$id}")->withErrors($messages);
    } else {
      $comment = ['text' => $input["text"], 'user_id' => Auth::user()->id];
      $comment = new Comment($comment);
      $photo = Photo::find($id);
      $photo->comments()->save($comment);
      return Redirect::to("/photos/{$id}");
    }
    
  }
  
}
