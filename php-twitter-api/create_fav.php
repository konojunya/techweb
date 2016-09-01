<?php
require_once 'lib/TwistOAuth.php';
require_once 'lib/TwistException.php';

$screen_name = "";
$password = "";

try {
	$to = new TwistOAuth('yT577ApRtZw51q4NPMPPOQ', '3neq3XqN5fO3obqwZoajavGFCUrC42ZfbrLXy5sCv8');
  $to = $to->renewWithAccessTokenX($screen_name, $password);
} catch (TwistException $e) {
	$error = $e->getMessage();
  echo $error.PHP_EOL;
}

$res = $to->get("https://api.twitter.com/1.1/statuses/home_timeline.json",array("count" => 10));

foreach($res as $tweet):

$to->post("https://api.twitter.com/1.1/favorites/create.json",array("id" => $tweet->id));

echo $tweet->text." faved\n";

endforeach;