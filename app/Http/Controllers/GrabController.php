<?php

namespace App\Http\Controllers;


class GrabController extends Controller
{
    public function start() {
    $feed = \Feeds::make('http://blog.case.edu/news/feed.atom');
    $data = array(
      'title'     => $feed->get_title(),
      'permalink' => $feed->get_permalink(),
      'items'     => $feed->get_items(),
    );

    return \View::make('feed', $data);
  }
  
}