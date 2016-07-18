<?php
session_start();

echo 'checkpoint';
echo $_SESSION["user"];
echo $_SESSION["password"];
echo $_SESSION["token"];
echo '<br>..........................<br>';
echo $_SESSION["checkpoint"];

?>
