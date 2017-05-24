<?php
session_start();
//require __DIR__ .'/../vendor/autoload.php';
require __DIR__ .'/vendor/autoload.php';

//$fb_id = getenv('FB_ID_MassTherr6');
//$token = getenv('FB_INDER_TOKEN_MassTherr6');
$token = $_SESSION["token"];
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);

echo $_GET["userid"]; 
echo '<br>';
echo $_GET["message"]; 
$mensagem = desesconde($_GET["message"]);
echo '<br>';
var_dump($tinder->sendMessage($_GET["userid"], $mensagem));
echo '<br>';
//header('Location: chat.php#' . $_GET["userid"]); 
header('Location: chat.php'); 

exit;


function desesconde($texto){
      $texto = str_replace('£1£','a',$texto);
      $texto = str_replace('£2£','e',$texto);
      $texto = str_replace('£3£','i',$texto);
      $texto = str_replace('£4£','o',$texto);
      $texto = str_replace('£5£','u',$texto);
      
      return $texto;
}

?>
