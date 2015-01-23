<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Teste extends Eloquent implements UserInterface, RemindableInterface {

	public $timestamps = false;
/*
	protected $table = 'gw_collab_user';
	
	protected $fillable = ['id','email','encryptedPassword','login','name'];

	public function gw_collab_profile()
    {
        return $this->hasOne('gw_collab_profile');
    }
*/
    public function phone()
    {
    	return $this->hasOne('Phone');
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

}

/*
class Profile extends Eloquent{
	public function profile() {
        return $this->hasOne('gw_collab_profile');
    }
}
*/
/* comentario teste commit gitg */