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
    $photos = $user->photos()->where('deleted', '=', '0')->get();
		//$following = $user->following;
		//$followers = $user->followers;
		//$profile = Profile::whereid($id)->first();

		return View::make('/users/show',['users' => $user, 'photos' => $photos]); 
				
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
    
    // return $input;
    
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
      $users = User::all();
		  return View::make('/users/index',['users' => $users]);
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
      return Redirect::to('/');
    } else {
      return Redirect::to('/users/login');
    }
  }
  
  // formulário de login
  public function logout()
  {
    Auth::logout();
    return Redirect::to('/');
  }

  public function follow($user_id)
  {
    $logged_user = Auth::user();
    
    if ($logged_user == null) //futuramente, adicionar filtro de login
      return Redirect::to('/');

    $following = $logged_user->following;

    
    if ($user_id != $logged_user->id && !$following->contains($user_id))
      $logged_user->following()->attach($user_id);

    return Redirect::to('/'); // redirecionar para friends
  }

  public function unfollow($user_id)
  {
    $logged_user = Auth::user();
    
    if ($logged_user == null) //futuramente, adicionar filtro de login
      return Redirect::to('/');

    $following = $logged_user->following;

    
    if ($user_id != $logged_user->id && $following->contains($user_id))
      $logged_user->following()->detach($user_id);

    return Redirect::to('/'); // redirecionar para friends
  }
  
  // AVATAR
  public function unfollow($user_id)
  {
    
  }

}
