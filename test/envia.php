<?php
//session_start();
//require __DIR__ .'/../vendor/autoload.php';
//$tinder = $_SESSION["hrinder"];
//require __DIR__ .'/../vendor/autoload.php';

require __DIR__ .'/../vendor/autoload.php';
$fb_id = getenv('FB_ID_MassTherr6');
$token = getenv('FB_INDER_TOKEN_MassTherr6');
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);


echo $_GET["userid"]; 
echo '<br>';
echo $_GET["message"]; 
echo '<br>';
echo '<br>';
var_dump($tinder->sendMessage($_GET["userid"], $_GET["message"]));
echo '<br>';
echo '<br>';
echo 'fim1';
echo '<br>';
header("Location: chat.php"); 
exit;
echo '<br>';
echo 'fim2';
?>