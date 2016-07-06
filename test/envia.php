<?php

echo $_GET["userid"]; 
echo '<br>';
echo $_GET["message"]; 
var_dump($tinder->sendMessage($_GET["userid"], $_GET["message"]));
?>
