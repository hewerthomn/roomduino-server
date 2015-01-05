<?php namespace App\Models;
/**
* Temperature Model
*/
class Temperature extends \Eloquent
{
	protected $table = 'temperatures';

	public $timestamps = false;

	protected $dates = ['created_at'];

	public function dew_point($temp = null, $humidity = null)
	{
		$this->temperature = ($temp != null) ? $temp : $this->temperature;
		$this->humidity = ($humidity != null) ? $humidity : $this->humidity;

		$RATIO = 373.15 / (273.15 + $this->temperature); // $RATIO wa originally named A0, possibly confusing in Arduino context
		$SUM = -7.90298 * ($RATIO - 1);
		$SUM += 5.02808 * log10($RATIO);
		$SUM += -1.3816e-7 * (pow(10, (11.344 * (1 - 1/$RATIO ))) - 1);
		$SUM += 8.1328e-3 * (pow(10, (-3.49149 * ($RATIO - 1))) - 1);
		$SUM += log10(1013.246);
		$VP = pow(10, $SUM - 3) * $this->humidity;
		$T = log($VP / 0.61078); // temp var
		return number_format( (241.88 * $T) / (17.558 - $T), 2);
	}
}
