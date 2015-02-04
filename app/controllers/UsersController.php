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

		return View::make('/users.show',['users' => $user, 'photos' => $photos]); 
				
				//->with('users' => $user)
				//->with('gw_collab_profile' => $gw_collab_profile);
		//return View::make('/users.show');
		
	}
  
  // show create account form
  public function account()
  {
    return View::make('modal.account');
  }
  
  // create user 
  public function store()
  {
    $input = Input::all();
    
    // return $input;
    
    // validate data
    $rules = array(
        'name' => 'required',
        'password' => 'required|min:6',
        'email' => 'required|email|unique:users'
    );
    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
      return Redirect::to('users.accout')->withErrors($validator);
    } else {
      // save user
      User::create(['name'=>$input["name"],'email'=>$input["email"],'password'=>Hash::make($input["password"]),'login'=>$input["login"]]);
    }
    
  }
  
}
