<?php

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookAuthorizationException;
use Facebook\FacebookRequestException;

class UsersController extends \BaseController {

  public function __construct()
  {
    $this->beforeFilter('auth',
      array('only' => ['follow', 'unfollow']));
  }

	public function index()
	{
		$users = User::all();

		return View::make('/users/index',['users' => $users]);
	}

	public function show($id)
	{
		$user = User::whereid($id)->first();
    // $photos = $user->photos()->where('deleted', '=', '0')->get()->reverse();
    $photos = $user->photos()->get()->reverse();
		return View::make('/users/show',['user' => $user, 'photos' => $photos]); 
	}
  
  // show create account form
  public function account()
  {
    if (Auth::check()) return Redirect::to('/');
    return View::make('/modal/account');
  }

  // create user 
  public function store()
  {    
    // put input into flash session for form repopulation
    Input::flash();
    $input = Input::all();
    
    // validate data
    $rules = array(
        'name' => 'required',
        'login' => 'required|unique:users',
        'password' => 'required|min:6|confirmed',
        'email' => 'required|email|unique:users',
        'terms' => 'required'
    );     
    $validator = Validator::make($input, $rules);   
    if ($validator->fails()) {
      $messages = $validator->messages();
      return Redirect::to('/users/account')->withErrors($messages);
    } else {
      // save user
      User::create(['name'=>$input["name"],'email'=>$input["email"],'password'=>Hash::make($input["password"]),'login'=>$input["login"]]);
      // auto login after saving
      $userdata = array(
          'login'     => $input["login"],
          'password'  => $input["password"]
      );
  
      // attempt to do the login
      if (Auth::attempt($userdata)) {
        return Redirect::to('/');
      } else {
        return $error;
      }
      /*
      $users = User::all();
		  return View::make('/users/index',['users' => $users]);
      */
    }
  }
  
  // formulário de login
  public function loginForm()
  {
    if (Auth::check())
      return Redirect::to('/');

		session_start();
    $fb_config = Config::get('facebook');
    FacebookSession::setDefaultApplication($fb_config["id"], $fb_config["secret"]);
    $helper = new FacebookRedirectLoginHelper(url('/users/login/fb/callback'));
    $fburl = $helper->getLoginUrl(array(
        'scope' => 'email',
    ));

    if (!Session::has('filter.login') && !Session::has('login.message')) //nao foi acionado pelo filtro, retornar para pagina anterior
      Session::put('url.previous', URL::previous());
    
    return View::make('/modal/login')->with(['fburl' => $fburl]);
  }
  
  // validacao do login
  public function login()
  {
    $input = Input::all();
    
    $user = User::where('login', '=', $input["login"])->first();

    if ($user != null && $user->oldAccount == 1)
    {
      if ( User::checkOldAccount($user, $input["password"]) )
      {
        $user->oldAccount = 0;
        $user->password = Hash::make($input["password"]);
        $user->save();
      } else {
        Session::put('login.message', 'Usuário e/ou senha inválidos, tente novamente.');
        return Redirect::to('/users/login')->withInput();
      }
    }

    if (Auth::attempt(array('login' => $input["login"], 'password' => $input["password"])))
    {
      if ( Session::has('filter.login') ) //acionado pelo login
      { 
        Session::forget('filter.login');
        return Redirect::intended('/');
      }
      if ( Session::has('url.previous') )
      {
        $url = Session::pull('url.previous');
        if (!empty($url) )
          return Redirect::to($url);
        return Redirect::to('/');
      }
      return Redirect::to('/');
    } else {
			Session::put('login.message', 'Usuário e/ou senha inválidos, tente novamente.');
      return Redirect::to('/users/login')->withInput();
    }
  }
  
  // formulário de login
  public function logout()
  {
    Auth::logout();
    return Redirect::to('/');
  }
  
  // facebook login NÃO ESTA SENDO USADO
  public function facebook()
  {
    $fb_config = Config::get('facebook');
    $facebook = new Facebook( $fb_config );
    
    $params = array(
        'redirect_uri' => url('/users/login/fb/callback'),
        'scope' => 'email',
    );
    return Redirect::to($facebook->getLoginUrl($params));
  }
	
	// facebook login callback
	public function callback() 
	{
    session_start();
    
    $fb_config = Config::get('facebook');
    
    FacebookSession::setDefaultApplication($fb_config["id"], $fb_config["secret"]);
    
    $helper = new FacebookRedirectLoginHelper(url('/users/login/fb/callback'));
    
    try {
      $session = $helper->getSessionFromRedirect();
    } catch(FacebookRequestException $ex) {
      // When Facebook returns an error
      dd($ex);
    } catch(\Exception $ex) {
      // When validation fails or other local issues
      dd($ex);
    }
    if ($session) {
      // Logged in
      $request = new FacebookRequest($session, 'GET', '/me');
      $response = $request->execute();
      $fbuser = $response->getGraphObject();
      $fbid = $fbuser->getProperty('id');
      
      //usuarios antigos tem campo id_facebook null, mas existe login = $fbid;
      $user = User::where('id_facebook', '=', $fbid)->orWhere('login', '=', $fbid)->first();
      
      if (!is_null($user)) {
        // loga usuário existente
        Auth::loginUsingId($user->id);
        
        // pega avatar
        $request = new FacebookRequest(
          $session,
          'GET',
          '/me/picture',
          array (
            'redirect' => false,
            'height' => '200',
            'type' => 'normal',
            'width' => '200',
          )
        );
        $response = $request->execute();
        $pic = $response->getGraphObject();
        $image = Image::make($pic->getProperty('url'))->save(public_path().'/arquigrafia-avatars/'.$user->id.'.jpg');
        if ($user->photo == "") {
          $user->photo = '/arquigrafia-avatars/'.$user->id.'.jpg';
          $user->save();
        }
        
        return Redirect::to('/')->with('message', "Bem-vindo {$user->name}!");
        
      } else {
        // cria um novo usuário
        $user = new User;
        $user->name = $fbuser->getProperty('name');
        $user->login = $fbuser->getProperty('id');
        $user->email = $fbuser->getProperty('email');
        $user->password = 'facebook';
        $user->id_facebook = $fbuser->getProperty('id');
        $user->save();
        Auth::loginUsingId($user->id);
        
        // pega avatar
        $request = new FacebookRequest(
          $session,
          'GET',
          '/me/picture',
          array (
            'redirect' => false,
            'height' => '200',
            'type' => 'normal',
            'width' => '200',
          )
        );
        $response = $request->execute();
        $pic = $response->getGraphObject();
        $image = Image::make($pic->getProperty('url'))->save(public_path().'/arquigrafia-avatars/'.$user->id.'.jpg'); 
        $user->photo = '/arquigrafia-avatars/'.$user->id.'.jpg';
        $user->save();
        
        // return $user;
        return Redirect::to('/')->with('message', 'Sua conta foi criada com sucesso!');
      }
      
      /*
      
      EXEMPLO DE RETORNO
      
      object(Facebook\GraphObject)[288]
        protected 'backingData' => 
          array (size=11)
            'id' => string '10205457080562389' (length=17)
            'first_name' => string 'Pedro' (length=5)
            'gender' => string 'male' (length=4)
            'last_name' => string 'Guglielmo' (length=9)
            'link' => string 'https://www.facebook.com/app_scoped_user_id/10205457080562389/' (length=62)
            'locale' => string 'pt_BR' (length=5)
            'middle_name' => string 'Emilio' (length=6)
            'name' => string 'Pedro Emilio Guglielmo' (length=22)
            'timezone' => int -3
            'updated_time' => string '2015-01-30T21:09:07+0000' (length=24)
            'verified' => boolean true
      
      */
      
    }
    
    /*
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');
    
    dd($me);

    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {

        $user = new User;
        $user->name = $me['first_name'].' '.$me['last_name'];
        $user->email = $me['email'];
        $user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';

        $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
        $profile->username = $me['username'];
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return Redirect::to('/')->with('message', 'Logged in with Facebook');
    */
    
	}

  public function follow($user_id)
  {
    $logged_user = Auth::user();
    
    if ($logged_user == null) //futuramente, adicionar filtro de login
      return Redirect::to('/');

    $following = $logged_user->following;

    
    if ($user_id != $logged_user->id && !$following->contains($user_id))
      $logged_user->following()->attach($user_id);

    return Redirect::to(URL::previous()); // redirecionar para friends
  }

  public function unfollow($user_id)
  {
    $logged_user = Auth::user();
    
    if ($logged_user == null) //futuramente, adicionar filtro de login
      return Redirect::to('/');

    $following = $logged_user->following;

    
    if ($user_id != $logged_user->id && $following->contains($user_id))
      $logged_user->following()->detach($user_id);

    return Redirect::to(URL::previous()); // redirecionar para friends
  }
  
  // AVATAR
  public function profile($id)
  {
    $path = public_path().'/arquigrafia-avatars/'.$id.'_view.jpg';
    if( File::exists($path) ) {
      header("Cache-Control: public");
      header("Content-Disposition: inline; filename=\"".$id . '_view.jpg'."\"");
      header("Content-Type: image/jpg");
      header("Content-Transfer-Encoding: binary");
      readfile($path);
      exit;
    }
    return $path;
  }

/**
 * Show the form for editing the specified resource.
 *
 * @return Response
 */
  public function edit($id) {     
    $user = User::find($id);   
    return View::make('users.edit')
      ->with(
        ['user' => $user] );
  }

  public function update($id) {              
    $user = User::find($id);
    
    Input::flash();    
    $input = Input::only('name', 'login', 'email', 'scholarity', 'lastName', 'site', 'birthday', 'country', 'state', 'city', 
      'photo', 'gender', 'institution', 'occupation', 'visibleBirthday', 'visibleEmail');    
    
    $rules = array(
        'name' => 'required',
        'login' => 'required',
        'email' => 'required|email'                  
    );     

    if ($input['email'] !== $user->email)        
      $rules = array('email' => 'required|email|unique:users');        

    if ($input['login'] !== $user->login)
      $rules = array('login' => 'required|unique:users');

    $validator = Validator::make($input, $rules);   
    if ($validator->fails()) {
      $messages = $validator->messages();      
      return Redirect::to('/users/' . $id . '/edit')->withErrors($messages);
    } else {  
      $user->name = $input['name'];
      $user->login = $input['login'];
      $user->email = $input['email'];      
      $user->scholarity = $input['scholarity'];
      $user->lastName = $input['lastName'];
      $user->site = $input['site'];
      $user->birthday = $input['birthday'];
      $user->country = $input['country'];
      $user->state = $input['state'];
      $user->city = $input['city'];  
      $user->gender = $input['gender'];  
      $user->visibleBirthday = $input['visibleBirthday'];  
      $user->visibleEmail = $input['visibleEmail'];   

      $user->save();   

      if ($input["institution"] != null or $input["occupation"] != null) {
        $occupation = Occupation::firstOrCreate(['user_id'=>$user->id]);
        $occupation->institution = $input["institution"];
        $occupation->occupation = $input["occupation"];
        $occupation->save();
      }

      if (Input::hasFile('photo') and Input::file('photo')->isValid())  {    
        $file = Input::file('photo');
        $ext = $file->getClientOriginalExtension();
        $user->photo = "/arquigrafia-avatars/".$user->id.".".$ext;
        $user->save();
        $image = Image::make(Input::file('photo'))->encode('jpg', 80);         
        $image->save(public_path().'/arquigrafia-avatars/'.$user->id.'.jpg');
        $file->move(public_path().'/arquigrafia-avatars', $user->id."_original.".strtolower($ext));         
      } 
      
      return Redirect::to('/users/' . $user->id);
    }    
  }

}
