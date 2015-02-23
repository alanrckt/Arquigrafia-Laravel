<?php

class UsersController extends \BaseController {

	public function index()
	{
			$users = User::all();

		  return View::make('/users/index',['users' => $users]);
	}

	public function show($id)
	{
		$user = User::whereid($id)->first();
    $photos = $user->photos()->where('deleted', '=', '0')->get()->reverse();
		//$following = $user->following;
		//$followers = $user->followers;
		//$profile = Profile::whereid($id)->first();

		return View::make('/users/show',['user' => $user, 'photos' => $photos]); 
				
				//->with('users' => $user)
				//->with('gw_collab_profile' => $gw_collab_profile);
		//return View::make('/users.show');
		
	}
  
  // show create account form
  public function account()
  {
    return View::make('/modal/account');
  }
  
  // create user 
  public function store()
  {
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
    return View::make('/modal/login');
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
        return Redirect::to('/users/login');  
      }
    }

    if (Auth::attempt(array('login' => $input["login"], 'password' => $input["password"])))
    {
			Session::forget('login.message');
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
	
	// facebook login
	public function callback() 
	{
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');

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
	}

  public function follow($user_id)
  {
    $logged_user = Auth::user();
    
    if ($logged_user == null) //futuramente, adicionar filtro de login
      return Redirect::to('/');

    $following = $logged_user->following;

    
    if ($user_id != $logged_user->id && !$following->contains($user_id))
      $logged_user->following()->attach($user_id);

    return Redirect::back(); // redirecionar para friends
  }

  public function unfollow($user_id)
  {
    $logged_user = Auth::user();
    
    if ($logged_user == null) //futuramente, adicionar filtro de login
      return Redirect::to('/');

    $following = $logged_user->following;

    
    if ($user_id != $logged_user->id && $following->contains($user_id))
      $logged_user->following()->detach($user_id);

    return Redirect::back(); // redirecionar para friends
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
  
  public function comments()
  {
      return $this->hasMany('Comment');
  }

}
