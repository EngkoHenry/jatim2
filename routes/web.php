<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainstreamController@show');

Route::get('mainstream', 'MainstreamController@show');

Route::get('twitter', 'TwitterController@show');

Route::get('chart', function () {
    return view('welcome');
});


Route::get('/grabgalert', function(){
 $url = 'https://www.google.com/alerts/feeds/17433293890439964009/8778119014002706904'; //khof
 $xml_string = file_get_contents($url);
 $xml = simplexml_load_string($xml_string);
 $json = json_encode($xml);
 $json = json_decode($json, TRUE);
 foreach ($json['entry'] as $data )
 {
	\DB::connection('mongodb')->collection('khofifah')->where('id', $data['id'])->update($data, ['upsert' => true]);
 }
 
 $url = 'https://www.google.com/alerts/feeds/17433293890439964009/14634290886364729844'; //ipul
 $xml_string = file_get_contents($url);
 $xml = simplexml_load_string($xml_string);
 $json = json_encode($xml);
 $json = json_decode($json, TRUE);
 foreach ($json['entry'] as $data )
 {
	\DB::connection('mongodb')->collection('gusipul')->where('id', $data['id'])->update($data, ['upsert' => true]);
 }
return $json['entry'];
});

Route::get('/userTimeline', function()
{
	$data = Twitter::getSearch(['q' => '@khofifahip', 'result_type' => 'recent', 'count' => 20, 'format' => 'json']);
	$data = json_decode($data, TRUE);
	return $data['statuses'];
});





