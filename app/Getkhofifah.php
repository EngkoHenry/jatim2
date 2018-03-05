<?php namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Getkhofifah extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'khofifah';
	//protected $dates = ['published'];

}