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

	public function getIndex()
	{
		try {

			$date = date('M, d');
			$time = date('H:i');
			$vars = [$date, $time];

			$temperature = new Temperature;
			$temperature->placename 	= Input::get('P');
			$temperature->temperature = Input::get('T');
			$temperature->humidity 		= Input::get('H');
			$temperature->dew_point   = $temperature->dew_point();
			$temperature->created_at 	= new \DateTime;

			$temperature->save();

		} catch (\Exception $e) {
			$message = strtoupper(substr($this->_clear($e->getMessage()), 0, 80));
			$vars = [$date, $time, $message];
		};

		return Response::make($this->_formatVars($vars), 200)
									 ->header('Content-Type', 'text/plain');
	}

	public function getList()
	{
		$placename = Input::get('P');

		$temps = $this->temperature
									->wherePlacename($placename)
									->get();

		return $temps;
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

	private function _clear($var)
	{
		$var = str_replace('<', '', $var);
		$var = str_replace('>', '', $var);
		$var = str_replace('|', '', $var);
		return $var;
	}

	private function _formatVars($vars = [], $startChar = '<', $endChar = '>', $separator = '|')
	{
		$result = $startChar;
		$result .= implode($separator, $vars);
		$result .= $endChar;

		return $result;
	}
}
