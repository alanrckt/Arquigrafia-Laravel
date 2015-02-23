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

/* phpinfo() */
Route::get('/info/', function(){ return View::make('i'); });

Route::get('/', 'PagesController@home');
Route::get('/panel', 'PagesController@panel');
Route::get('/search', 'PagesController@search');
Route::post('/search', 'PagesController@search');
Route::get('/project', function() { return View::make('project'); });
Route::get('/faq', function() { return View::make('faq'); });
Route::get('/chancela', function() { return View::make('chancela'); });

Route::resource('/teste','TesteController');

/* USERS */
Route::get('/users/account', 'UsersController@account');
Route::get('/users/login', 'UsersController@loginForm');
Route::post('/users/login', 'UsersController@login');
Route::get('/users/logout', 'UsersController@logout');
Route::get('users/fb/callback', 'UsersController@callback');
Route::resource('/users','UsersController');

/* FOLLOW */
Route::get('/friends/follow/{user_id}', 'UsersController@follow');
Route::get('/friends/unfollow/{user_id}', 'UsersController@unfollow');

// AVATAR 
Route::get('/profile/10/showphotoprofile/{profile_id}', 'UsersController@profile');

Route::resource('/profile','ProfileController'); // lixo ?

/* ALBUMS */
Route::resource('/albums','AlbumsController');

/* COMMENTS */
Route::post('/photos/{photo_id}/comment','PhotosController@comment');

/* PHOTOS */
Route::get('/photos/upload','PhotosController@form');
Route::get('/photos/download/{photo_id}','PhotosController@download');
Route::resource('/photos','PhotosController');

Route::resource('/groups','GroupsController');

/* TAGS */
Route::get('/tags/json', 'TagsController@index');

/*
Route::get('/teste', function()
{
	$teste = User::all();
	//$user = DB::table('user')->find(1);
	//dd($user);
	//return $androidapplication;
	return View::make('users.teste',['teste' => $teste]);
});

Route::get('/teste/{name}', function($name)
{
	$teste = User::whereName($name)->first();

	return View::make('users.show',['teste' => $teste]);
});

Route::get('/users', function()
{
	//$users = DB::table('gw_collab_user')->get();

*/

/*	User::create([
        'email' => 'ken@gmail.com',
        'encryptedPassword' => Hash::make('1234'),
        'login' => 'ken',
        'name' => 'ken'
        ]);
*/

 //return $users;


//	$users = User::all();
 //	return View::make('user');
//});
/*
Route::get('/users', function()
{
	$users = DB::table('gw_collab_user');

 	return View::make('users');
});


Route::get('/photos', function()
{
 return View::make('photos');
});


Route::get('/index', function()
{
 return View::make('index');
});

Route::get('/albums', function()
{
 return View::make('albums');
});

Route::get('/groups', function()
{
 return View::make('groups');
});

*/