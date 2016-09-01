<?php
require_once 'lib/TwistOAuth.php';
require_once 'lib/TwistException.php';

define('CONSUMER_KEY', '取得したキー');
define('CONSUMER_SECRET', '取得したキー');
define('ACCESS_TOKEN', '取得したキー');
define('ACCESS_TOKEN_SECRET', '取得したキー');

try {
	$to = new TwistOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
} catch (TwistException $e) {
	$error = $e->getMessage();
  echo $error.PHP_EOL;
}

// parameter
$params = array("count" => 5);

// end point
$url = "https://api.twitter.com/1.1/statuses/home_timeline.json";

// response
$res = $to->get($url,$params);

foreach($res as $tweet):
	echo $tweet->text."\n";
endforeach;