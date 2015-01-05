<?php namespace App\Models;

/**
* Sensor Model
*/
class Sensor extends \Eloquent
{
	protected $table = 'sensors';

	public $timestamps = false;

	protected $dates = ['created_at'];

}
