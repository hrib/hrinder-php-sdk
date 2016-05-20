<?php
require '../vendor/autoload.php';

$fb_id = genenv('FB_ID');
$token = genenv('FB_INDER_TOKEN');
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);

var_dump($tinder->getUser());

?>
