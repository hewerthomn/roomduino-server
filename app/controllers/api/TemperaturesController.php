<?php namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Temperature;
use Input, Response;

/**
* API Temperatures Controller
*/
class TemperaturesController extends BaseController
{
	public function __construct(Temperature $temperature)
	{
		$this->temperature = $temperature;
	}

	public function getActual()
	{
		$placename = Input::get('P');

		$temp = $this->temperature
								 ->wherePlacename($placename)
								 ->orderBy('created_at', 'DESC')
								 ->first();

		return $temp;
	}
}
