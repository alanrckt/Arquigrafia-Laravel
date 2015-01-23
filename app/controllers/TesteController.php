<?php

class TesteController extends \BaseController {

	public function index()
	{
		$teste = Teste::all();

		 return View::make('tests.teste',['teste' => $teste]);
	}

	public function show($id)
	{
		$teste = Teste::whereId($id)->first();

		return View::make('tests.show',['teste' => $teste]);
	}
}
