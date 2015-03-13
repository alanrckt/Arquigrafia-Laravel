<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/data', function () { 
	//dd(Photo::translate('2012-03-01/2013-04-01')); 
	dd(Photo::translate('17/18'));
});

/* phpinfo() */
Route::get('/info/', function(){ return View::make('i'); });

Route::get('/', 'PagesController@home');
Route::get('/panel', 'PagesController@panel');
Route::get('/project', function() { return View::make('project'); });
Route::get('/faq', function() { return View::make('faq'); });
Route::get('/chancela', function() { return View::make('chancela'); });
Route::get('/termos', function() { return View::make('termos'); });

/* SEARCH */
Route::get('/search', 'PagesController@search');
Route::post('/search', 'PagesController@search');
Route::get('/search/more', 'PagesController@advancedSearch');

Route::resource('/teste','TesteController');

/* USERS */
Route::get('/users/account', 'UsersController@account');
Route::get('/users/login', 'UsersController@loginForm');
Route::post('/users/login', 'UsersController@login');
Route::get('/users/logout', 'UsersController@logout');
Route::get('users/login/fb', 'UsersController@facebook');
Route::get('users/login/fb/callback', 'UsersController@callback');
Route::resource('/users','UsersController');
Route::get('/users/account/edit', 'UsersController@edit');
Route::get('/users/update', 'UsersController@update');


/* FOLLOW */
Route::get('/friends/follow/{user_id}', 'UsersController@follow');
Route::get('/friends/unfollow/{user_id}', 'UsersController@unfollow');

// AVATAR 
Route::get('/profile/10/showphotoprofile/{profile_id}', 'UsersController@profile');

Route::resource('/profile','ProfileController'); // lixo ?

/* ALBUMS */
Route::resource('/albums','AlbumsController');
Route::get('/albums/delete/{id}', 'AlbumsController@delete');

/* COMMENTS */
Route::post('/photos/{photo_id}/comment','PhotosController@comment');

/* PHOTOS */
Route::get('/photos/batch','PhotosController@batch');
Route::get('/photos/upload','PhotosController@form');
Route::get('/photos/download/{photo_id}','PhotosController@download');
Route::resource('/photos','PhotosController');

Route::resource('/groups','GroupsController');

/* TAGS */
Route::get('/tags/json', 'TagsController@index');

