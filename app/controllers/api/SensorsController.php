<?php namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Sensor;
use DB, Input, Response;

/**
* API Sensors Controller
*/
class SensorsController extends BaseController
{
	public function __construct(Sensor $sensor)
	{
		$this->sensor = $sensor;
	}

	public function getIndex()
	{
		try {

			$date = date('M, d');
			$time = date('H:i');
			$vars = [$date, $time];

			$sensor = new Sensor;
			$sensor->name  			= Input::get('name');
			$sensor->value 			= Input::get('value');
			$sensor->created_at = new \DateTime;

			$sensor->save();

		} catch (\Exception $e) {
			$message = strtoupper(substr(clear_vars($e->getMessage()), 0, 80));
			$vars = [$date, $time, $message];
		}

		return Response::make(format_vars($vars), 200)
									 ->header('Content-Type', 'text/plain');
	}

	public function getValues()
	{
		$sensor = Input::get('sensor');
		$created_at = Input::has('created_at') ? Input::get('created_at') : date('Y-m-d');

		$values = $this->sensor->whereName($sensor)
													 ->where(DB::raw('DATE(created_at)'), '=', $created_at)
													 ->orderBy('created_at', 'DESC')
													 ->lists('value', 'created_at');

		return $values;
	}

	public function getActual()
	{
		$sensor = Input::get('sensor');
		$created_at = date('Y-m-d');

		$value = $this->sensor->whereName($sensor)
													->where(DB::raw('DATE(created_at)'), '=', $created_at)
													->orderBy('created_at', 'DESC')
													->select('value', 'created_at')
													->first();

		return $value;
	}
}
