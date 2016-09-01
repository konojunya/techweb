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

// tweet text
$text = "そろそろ行くか";

// parameter
$params = array("status" => $text);

// end point
$url = "https://api.twitter.com/1.1/statuses/update.json";

$to->post($url,$params);