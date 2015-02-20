<?php

use lib\date\Date;
// use lib\metadata\Exiv2;
// use lib\license\CreativeCommons_3_0;

class Photo extends Eloquent {
  
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
        return $this->belongsToMany('Tag', 'tag_assignments', 'photo_id', 'tag_id');
    }
    
    public function comments()
    {
        return $this->hasMany('Comment');
    }

    public static function formatDate($date)
    {
        return Date::formatDate($date);
    }

    public static function translate($date) {
        return Date::translate($date);
    }

    // public static function insertMetadata($photo, $originalFileExtension) {
    //     $dirImages = public_path() . '/arquigrafia-images';
    //     $owner = $photo->user->name;
    //     $imw = new Exiv2($originalFileExtension, $photo->id, $dirImages);
    //     $imw.setAuthor($photo->workAuthor);
    //     $imw.setArtist($photo->workAuthor, $owner);
    //     $imw.setCopyRight($photo->imageAuthor, new CreativeCommons_3_0($photo->allowCommercialUses,
    //         $photo->allowModifications));
    //     $imw.setDescription($photo->description);
    //     $imw.setUserComment($photo->aditionalImageComments);
    // }
}