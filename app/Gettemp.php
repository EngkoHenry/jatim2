<?php namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Gettemp extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'temp';
	protected $dates = ['Date'];

}