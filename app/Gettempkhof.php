<?php namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Gettempkhof extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'tempkhof';
	//protected $dates = ['Date'];

}