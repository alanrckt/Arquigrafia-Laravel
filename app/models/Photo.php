<?php

use lib\date\Date;
use lib\metadata\Exiv2;
use lib\license\CreativeCommons_3_0;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Photo extends Eloquent {
  
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

	protected $fillable = ['user_id','name', 'description', 'nome_arquivo','state','street', 'tombo', 'workAuthor', 'workdate', 'dataUpload', 'dataCriacao', 'country', 'collection', 'city'];

	static $allowModificationsList = [
		'YES' => ['Sim', ''],
		'YES_SA' => ['Sim, contanto que os outros compartilhem de forma semelhante', '-sa'],
		'NO' => ['Não', '-nd']
	]; 

	static $allowCommercialUsesList = [
		'YES' => ['Sim', ''],
		'NO' => ['Não', '-nc']
	];

	public function user()
	{
		return $this->belongsTo('User');
	}	

	public function tags()
	{
		return $this->belongsToMany('Tag', 'tag_assignments');
	}
	
	public function comments()
	{
		return $this->hasMany('Comment');
	}

	public function albums()
	{
		return $this->belongsToMany('Album', 'album_elements');
	}
  
	public function evaluations()
	{
		return $this->belongsToMany('Evaluation', 'photo_id');
	}

	public static function formatDate($date)
	{
		return Date::formatDate($date);
	}

	public static function translate($date) {
		return Date::translate($date);
	}

	public function saveMetadata($originalFileExtension)
	{
		$user = $this->user;
		$exiv2 = new Exiv2($originalFileExtension, $this->id, public_path() . '/arquigrafia-images/');	   
		$exiv2->setImageAuthor($this->workAuthor);
		$exiv2->setArtist($this->workAuthor, $user->name);
		$exiv2->setCopyRight($this->workAuthor, 
			new CreativeCommons_3_0($this->allowCommercialUses, $this->allowModifications));
		$exiv2->setDescription($this->description);
		$exiv2->setUserComment($this->aditionalImageComments);		   
	}

	public static function paginateUserPhotos($user, $perPage = 24) {
		return Photo::where('user_id', '=', $user->id)
			->paginate($perPage);
	}

	public static function paginateAlbumPhotos($album, $perPage = 24) {
		return $album->photos()->paginate($perPage);
	}

	public static function paginateOtherPhotos($user, $photos, $perPage = 24) {
		return Photo::where('user_id', '=', $user->id)
			->whereNotIn('id', $photos->modelKeys())
			->paginate($perPage);
	}

}