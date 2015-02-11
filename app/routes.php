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

Route::get('/info/', function(){ return View::make('i'); });

Route::get('/friends/follow/{user_id}', 'UsersController@follow');
Route::get('/friends/unfollow/{user_id}', 'UsersController@unfollow');
//Route::get('/users', 'UsersController@index');
//Route::get('/users/{id_usr}', 'UsersController@show');

Route::get('/', 'PagesController@home');
Route::get('/project', function() { return View::make('project'); });
Route::get('/faq', function() { return View::make('faq'); });
// Route::post('/search', function() { return View::make('search'); });

Route::resource('/teste','TesteController');

Route::get('/users/account', 'UsersController@account');
Route::get('/users/login', 'UsersController@loginForm');
Route::post('/users/login', 'UsersController@login');
Route::get('/users/logout', 'UsersController@logout');

// AVATAR 
Route::get('/profile/10/showphotoprofile/{profile_id}', 'UsersController@profile');

Route::resource('/users','UsersController');

Route::resource('/profile','ProfileController');

//Route::resource('/users/photos','PhotosController');

Route::resource('/albums','AlbumsController');
	
Route::get('/search', 'PhotosController@search');
Route::post('/search', 'PhotosController@search');
Route::get('/photos/upload','PhotosController@form');
Route::resource('/photos','PhotosController');

Route::resource('/groups','GroupsController');

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