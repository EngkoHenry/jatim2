<?php namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Getipul extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'gusipul';
	//protected $dates = ['published'];

}