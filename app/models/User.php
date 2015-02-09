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

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	//protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static function checkOldAccount( $user, $password)
	{
		$verify = exec('java -cp "./public/java:./public/java/jasypt-1.7.jar" PasswordValidator ' . $password . ' ' . $user->password);
  	  	if ( strcmp($verify, 'true') == 0 ) return true;
    	return false;
	}
}