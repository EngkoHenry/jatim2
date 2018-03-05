<?php namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Gettempipul extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'tempipul';
	//protected $dates = ['Date'];

}