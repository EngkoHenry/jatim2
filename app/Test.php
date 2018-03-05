<?php namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Test extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'test';
	//protected $dates = ['Date'];

}