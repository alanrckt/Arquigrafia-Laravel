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

	public function occupation()
	{
		return $this->hasOne('Occupation');
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

	public static function stoaUser($stoa_user) {

		$user = User::where('login', '=', 'stoa_' . $stoa_user->nusp)->first();

		if (!$user) {
			$user = User::newStoaUser($stoa_user);
		}

		if ($stoa_user->image_base64) {
			User::saveProfileImage($user, $stoa_user->image_base64);
		}

		return $user;
	}

	private static function newStoaUser($stoa_user) {
		$user = new User();
		$user->name = $stoa_user->first_name;
		$user->email = $stoa_user->email;
		$user->password = 'stoa';
		$user->login = 'stoa_' . $stoa_user->nusp;
		$user->id_stoa = 'stoa_' . $stoa_user->nusp;
		if ($stoa_user->surname)
			$user->name = $user->name . ' ' . $stoa_user->surname;
		if ($stoa_user->homepage)
			$user->site = $stoa_user->homepage;
		$user->save();

		return $user;
	}

	private static function saveProfileImage($user, $image) {
		$user->photo = "/arquigrafia-avatars/".$user->id.".jpg";
		$user->save();
		$image = Image::make(base64_decode($image))->encode('jpg', 80);
		$image->save(public_path().'/arquigrafia-avatars/'.$user->id.'.jpg');
		$image->save(public_path().'/arquigrafia-avatars/'. $user->id."_original.jpg");
	}
}