<?php

foreach($json['entry'] as $entry)
   <p> Member ID: {{ $entry['id'] }}</p>
    <p>Title: {{ $entry['title'] }}</p>

endforeach
