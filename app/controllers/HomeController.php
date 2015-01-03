<?php namespace App\Controllers;

use View;

class HomeController extends BaseController {

	public function app()
	{
		return View::make('home.app');
	}

}
