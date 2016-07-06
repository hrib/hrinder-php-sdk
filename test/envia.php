<?php
session_start();
require __DIR__ .'/../vendor/autoload.php';
$tinder = $_SESSION["hrinder"];
//require __DIR__ .'/../vendor/autoload.php';



echo $_GET["userid"]; 
echo '<br>';
echo $_GET["message"]; 
echo '<br>';
echo '<br>';
var_dump($tinder->sendMessage($_GET["userid"], $_GET["message"]));
echo '<br>';
echo '<br>';
echo 'fim';
?>
