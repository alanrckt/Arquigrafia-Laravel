<?php

class GroupsController extends \BaseController {

	public function index()
	{
		$users = User::all();

		  return View::make('/groups.index',['users' => $users]);
	}

	public function show($id)
	{
		$user = User::whereid($id)->first();
		$group = Photo::whereid($id)->first();

		return View::make('/groups.show',['users' => $user,'group' => $group]);
	}
}
