<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class MainstreamController extends Controller
{
   public function show() 
   {
	  $khof = $this->getJSON('https://www.google.com/alerts/feeds/17433293890439964009/8778119014002706904'); 
	  $ipul = $this->getJSON('https://www.google.com/alerts/feeds/17433293890439964009/14634290886364729844');
	  //$khofemil = $this->getJSON('https://www.google.com/alerts/feeds/17433293890439964009/5985084613932103640');
	  //$ipulputi = $this->getJSON('https://www.google.com/alerts/feeds/17433293890439964009/17941242850285220973');
 	  return view('mainstream',['khof' => $khof,'ipul' => $ipul]);
   }
   
   public function getJSON($url)
   {
	  
	  $xml_string = file_get_contents($url);
	  $xml = simplexml_load_string($xml_string);
	  $json = json_encode($xml);
	  $json = json_decode($json, TRUE);
	  return $json['entry'];
   }
   
   public static function getMedia($url)
   {
	   $media = str_after($url,'https://www.google.com/url?rct=j&sa=t&url=');
	   $media = str_after($media,'://');
	   $media = str_before($media,'/');
	   return $media;
   }
   
   public static function getToday($id)
   {
	   $today = \Carbon\Carbon::now()->toDateString();
	   switch ($id) {
		case 1:
			$today = \App\Getkhofifah::where('published','like',$today.'%')->get()->count();
			break;
		case 2:
			$today = \App\Getipul::where('published','like',$today.'%')->get()->count();
			break;
		} 
		
	   
	   return $today;
   }
   
   public static function getDataLabel()
   {
	   $ckhof = \App\Getkhofifah::raw(function($collection)
		{
			return $collection->aggregate([
				[
					'$group'    => [
						'_id'   => [
							'published' => [ '$substr' => [ '$published', 0, 10]  ]
							],
						'count' => ['$sum'  => 1]
						
					]
				]
			]);
			
		});
		
		$tgl = array();
		foreach ($ckhof as $data)
		{
			array_push($tgl, $data['_id']['published']);
		}
		return json_encode($tgl);
   }
   
   public static function getData($id)
   {
	   switch ($id) {
		case 1:
			$data = \App\Getkhofifah::raw(function($collection)
					{
						return $collection->aggregate([
							[
								'$group'    => [
									'_id'   => [
										'published' => [ '$substr' => [ '$published', 0, 10]  ]
										],
									'count' => ['$sum'  => 1]
									
								]
							]
						]);
						
					});
			break;
		case 2:
			$data = \App\Getipul::raw(function($collection)
					{
						return $collection->aggregate([
							[
								'$group'    => [
									'_id'   => [
										'published' => [ '$substr' => [ '$published', 0, 10]  ]
										],
									'count' => ['$sum'  => 1]
									
								]
							]
						]);
						
					});
			break;
		} 
		
		
		$count = array();
		foreach ($data as $data)
		{
			array_push($count, $data['count']);
		}
		return json_encode($count);
   }
   
}
