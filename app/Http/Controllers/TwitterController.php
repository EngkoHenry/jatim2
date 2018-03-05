<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \Twitter;


class TwitterController extends Controller
{
   public function show() 
   {
	  $mention = Twitter::getSearch(['q' => '@khofifahip', 'result_type' => 'recent', 'count' => 20, 'format' => 'json']);
	  $mention = json_decode($mention, TRUE);
	  
	  return view('twitter',['mention' => $mention['statuses']]);
   }
   
   
   
}
