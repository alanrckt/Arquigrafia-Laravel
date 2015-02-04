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
    $photos = $user->photos;
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
        'password' => 'required|min:6|confirmed',
        'email' => 'required|email|unique:users'
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
}
