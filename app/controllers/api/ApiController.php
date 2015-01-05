<?php namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Sensor;
use App\Models\Temperature;
use Input, Response;

/**
* API Controller
*/
class ApiController extends BaseController
{

	public function __construct(Sensor $sensor, Temperature $temperature)
	{
		$this->sensor = $sensor;
		$this->temperature = $temperature;
	}

	public function anyIndex()
	{
		try {

			$date = date('M, d');
			$time = date('H:i');
			$vars = [$date, $time];

			$placename = Input::get('placename');

			$temp = new Temperature;
			$temp->placename = $placename;
			$temp->temperature = Input::get('temperature');
			$temp->humidity = Input::get('humidity');
			$temp->dew_point = $temp->dew_point();
			$temp->created_at = new \DateTime;
			$temp->save();

			$sensors = ['photocell'];

			foreach ($sensors as $SENSOR)
			{
				$sensor = new Sensor;
				$sensor->name = $SENSOR;
				$sensor->value = Input::get($SENSOR);
				$sensor->placename = $placename;
				$sensor->created_at = new \DateTime;
				$sensor->save();
			}

		} catch (\Exception $e) {
			$message = strtoupper(substr(clear_vars($e->getMessage()), 0, 80));
			$vars = [$date, $time, $message];
		}

		return Response::make(format_vars($vars), 200)
			->header('Content-Type', 'text/plain');
	}
}
