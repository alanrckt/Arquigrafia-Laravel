<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

class PhotosController extends \BaseController {

	public function __construct() 
  {
    $this->beforeFilter('auth', 
      array( 'except' => ['index','show'] ));
  }

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

  public function store() {  
	// put input into flash session for form repopulation
	Input::flash();
	
	$input = Input::all();
	// validate data	
    $rules = array(			
        'photo_name' => 'required',
        'photo_imageAuthor' => 'required',
        'tags' => 'required',
        'photo_country' => 'required',
        'photo_state' => 'required',
		'photo_city' => 'required'
    );
	$validator = Validator::make($input, $rules);
	    
  if ($validator->fails()) {
      $messages = $validator->messages();      
	  return Redirect::to('/photos/upload')->withErrors($messages);
    } else {

    if (Input::hasFile('photo') and Input::file('photo')->isValid()) {      
      $file = Input::file('photo');
      $photo = new Photo();
      
      if ( !empty($input["photo_aditionalImageComments"]) ) 
        $photo->aditionalImageComments = $input["photo_aditionalImageComments"];
      $photo->allowCommercialUses = $input["photo_allowCommercialUses"];
      $photo->allowModifications = $input["photo_allowModifications"];
      $photo->city = $input["photo_city"];
      $photo->country = $input["photo_country"];
      if ( !empty($input["photo_description"]) )
        $photo->description = $input["photo_description"];
      if ( !empty($input["photo_district"]) )
        $photo->district = $input["photo_district"];
      if ( !empty($input["photo_imageAuthor"]) )  
        $photo->imageAuthor = $input["photo_imageAuthor"];
      $photo->name = $input["photo_name"];
      $photo->state = $input["photo_state"];
      if ( !empty($input["photo_street"]) )
        $photo->street = $input["photo_street"];
      if ( !empty($input["photo_workAuthor"]) )
        $photo->workAuthor = $input["photo_workAuthor"];
      if ( !empty($input["photo_workDate"]) )
        $photo->workdate = Photo::formatDate($input["photo_workDate"]);
      if ( !empty($input["photo_imageDate"]) )
        $photo->dataCriacao = Photo::formatDate($input["photo_imageDate"]);
      $photo->deleted = false;
      $photo->nome_arquivo = $file->getClientOriginalName();

      $photo->user_id = Auth::user()->id;
      
      $photo->dataUpload = date('Y-m-d H:i:s');

      $photo->save();

      $ext = $file->getClientOriginalExtension();
      $photo->nome_arquivo = $photo->id.".".$ext;
      
      $photo->save();

      $input["tags"] = str_replace(array('\'', '"', '[', ']'), '', $input["tags"]); 
      $tags = preg_split("/[\s,]+/", $input["tags"]);
      
      if (!empty($tags)) {
        $tags = array_map('trim', $tags);
        $tags = array_map('strtolower', $tags);
        // tudo em minusculas, para remover redundancias, como Casa/casa/CASA
        $tags = array_unique($tags); //retira tags repetidas, se houver.
        foreach ($tags as $t) {          
          $tag = Tag::firstOrCreate(['name' => $t]); //não deveria haver tags repetidas no banco
          $photo->tags()->attach($tag->id);
          if ($tag->count == null)
            $tag->count = 0;
          $tag->count++;
          $tag->save();
        }
      }

      $image = Image::make(Input::file('photo'))->encode('jpg', 80); // todas começam com jpg quality 80
      $image->widen(600)->save(public_path().'/arquigrafia-images/'.$photo->id.'_view.jpg');
      $image->heighten(220)->save(public_path().'/arquigrafia-images/'.$photo->id.'_200h.jpg'); // deveria ser 220h, mantem por já haver alguns arquivos assim.
      $image->fit(186, 124)->encode('jpg', 70)->save(public_path().'/arquigrafia-images/'.$photo->id.'_home.jpg');
      $file->move(public_path().'/arquigrafia-images', $photo->id."_original.".strtolower($ext)); // original

      $photo->saveMetadata($ext);

      return Redirect::to("/photos/{$photo->id}");

    } else {
	  $messages = $validator->messages();
      return Redirect::to('/photos/upload')->withErrors($messages);      
    }
 }
}

  
  // ORIGINAL
  public function download($id)
  {
    if (Auth::check()) {
      $photo = Photo::find($id);
      $originalFileExtension = substr(strrchr($photo->nome_arquivo, '.'), 1);
      $filename = $id . '_original.' . $originalFileExtension;
      $path = public_path().'/arquigrafia-images/'. $filename;
      
      if( File::exists($path) ) {
      
        /*==================================================================================*/
        /*      Log de Downloads - user_id, photo_id, download_date                         */
        /*==================================================================================*/
        
        $user_id = Auth::user()->id; //usuario logado, verificado em Auth::check()
        $log_info = sprintf('[%s][%d][%d]', date('Y-m-d'), $user_id, $id);

        $log = new Logger('Download_logger');
        $file = storage_path() . '/logs/downloads/downloads.log';
        if (!file_exists($file)) {
          $handle = fopen($file, 'a+');
          fclose($handle);
        }

        $formatter = new LineFormatter("%message%\n", null, false, true);
        $handler = new StreamHandler($file, Logger::INFO);
        $handler->setFormatter($formatter);
        $log->pushHandler($handler);
        $log->addInfo($log_info);

        /*================================================================================*/

        header('Content-Description: File Transfer');        
        header("Content-Disposition: attachment; filename=\"". $filename ."\"");
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
  
  // BATCH RESIZE
  public function batch()
  {
    $photos = Photo::all();
    foreach ($photos as $photo) {
      $path = public_path().'/arquigrafia-images/'.$photo->id.'_view.jpg';
      $new = public_path().'/arquigrafia-images/'.$photo->id.'_home.jpg';
      if (is_file($path) && !is_file($new)) $image = Image::make($path)->fit(186, 124)->save($new);
    }
    return "OK.";
  }

  /**
 * Show the form for editing the specified resource.
 *
 * @return Response
 */
  public function edit($id) {     
    $photo = Photo::find($id); 
    return View::make('photos.edit')
      ->with(['photo' => $photo, 'tags' => $photo->tags] );
  }

  public function update($id) {              
    $photo = Photo::find($id);
     Input::flash();    
     $input = Input::only('photo_name', 'photo_imageAuthor', 'tags', 'photo_country', 'photo_state', 'photo_city', 
      'photo_aditionalImageComments', 'photo_allowCommercialUses', 'photo_allowModifications', 'photo_description', 
      'photo_district', 'photo_street', 'photo_workAuthor', 'photo_workDate', 'photo_imageDate');    

    // validate data      
    $rules = array(     
        'photo_name' => 'required',
        'photo_imageAuthor' => 'required',
        'tags' => 'required',
        'photo_country' => 'required',
        'photo_state' => 'required',
        'photo_city' => 'required'
    );  

  $validator = Validator::make($input, $rules);
      
  if ($validator->fails()) {
      $messages = $validator->messages();      
    return Redirect::to('/photos/edit')->withErrors($messages);
    } else {        
      if ( !empty($input["photo_aditionalImageComments"]) ) 
        $photo->aditionalImageComments = $input["photo_aditionalImageComments"];
      $photo->allowCommercialUses = $input["photo_allowCommercialUses"];
      $photo->allowModifications = $input["photo_allowModifications"];
      $photo->city = $input["photo_city"];
      $photo->country = $input["photo_country"];
      if ( !empty($input["photo_description"]) )
        $photo->description = $input["photo_description"];
      if ( !empty($input["photo_district"]) )
        $photo->district = $input["photo_district"];
      if ( !empty($input["photo_imageAuthor"]) )  
        $photo->imageAuthor = $input["photo_imageAuthor"];
      $photo->name = $input["photo_name"];
      $photo->state = $input["photo_state"];
      if ( !empty($input["photo_street"]) )
        $photo->street = $input["photo_street"];
      if ( !empty($input["photo_workAuthor"]) )
        $photo->workAuthor = $input["photo_workAuthor"];
      if ( !empty($input["photo_workDate"]) )
        $photo->workdate = Photo::formatDate($input["photo_workDate"]);
      if ( !empty($input["photo_imageDate"]) )
        $photo->dataCriacao = Photo::formatDate($input["photo_imageDate"]);
      $photo->deleted = false;          

      $photo->save();      

      $input["tags"] = str_replace(array('\'', '"', '[', ']'), '', $input["tags"]); 
      $tags = preg_split("/[\s,]+/", $input["tags"]);
      
      if (!empty($tags)) {
        $tags = array_map('trim', $tags);
        $tags = array_map('strtolower', $tags);
        $tags_id = [];
        $photo_tags = $photo->tags;
        // tudo em minusculas, para remover redundancias, como Casa/casa/CASA
        $tags = array_unique($tags); //retira tags repetidas, se houver.
        foreach ($tags as $t) {          
          $tag = Tag::firstOrCreate(['name' => $t]); //não deveria haver tags repetidas no banco
          if ( !$photo_tags->contains($tag) )
          {
            if ($tag->count == null) $tag->count = 0;
            $tag->count++;
            $photo->tags()->attach($tag->id);
            $tag->save();
          }
          array_push($tags_id, $tag->id);
        }

        foreach($photo_tags as $tag)
        {
          if (!in_array($tag->id, $tags_id))
          {
            $tag->count--;
            $photo->tags()->detach($tag->id);
            $tag->save();
          }
        }

      }       

      return Redirect::to("/photos/{$photo->id}"); 
     
  }

  
}

}