<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	
	protected $fillable = ['id','name','email','password','login'];

	public function photos()
    {
        return $this->hasMany('Photo');
    }

    public function comments()
    {
      return $this->hasMany('Comment');
    }
    
    public function albums()
    {
        return $this->hasMany('Album');
    }

    //seguidores
    public function followers()
    {
    	return $this->belongsToMany('User', 'friendship', 'followed_id', 'following_id');
    }

    //seguindo
    public function following()
    {
    	return $this->belongsToMany('User', 'friendship', 'following_id', 'followed_id');
    }

	use UserTrait, RemindableTrait;

	protected $hidden = array('password', 'remember_token');

	public static function checkOldAccount( $user, $password)
	{
		$verify = exec('java -cp "' . public_path() . '/java:' . public_path() . '/java/jasypt-1.7.jar" PasswordValidator ' . $password . ' ' . $user->password);
  	    if ( strcmp($verify, 'true') == 0 ) return true;
    	return false;
	}
}