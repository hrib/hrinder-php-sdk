<?php
session_start();

echo 'checkpoint<br>';
//echo $_SESSION["user"];
//echo $_SESSION["password"];
//echo $_SESSION["token"];
echo $_POST["fb_dtsg"] .'<br>';
echo $_POST["nh"] .'<br>';
echo '<br>..........................<br>';
echo $_SESSION["checkpoint"];

$textopost = 'submit[Continue]=Continue';
//$textopost = '';

foreach ($_POST as $key => $value){
  echo "{$key} = {$value}\r\n";
  echo '<br>';
  if(strcasecmp($key,'submit') !== 0){
    $textopost = $key . '=' . urlencode($value) . '&' . $textopost;
    //echo '<br>a:' . $textopost . '<br>';
  }else{
    var_dump($key);
    echo '<br>';
    var_dump($value);
    echo '<br>';
    $textopost = $key . '=' . urlencode($key->Submit) . '&' . $textopost;
    echo $key . ' a<br>';
    echo $value[1] . ' b<br>';
    echo $value->Submit . ' c<br>';
    echo $value->{Submit} . ' d<br>';
    echo $value->[Continue] . ' e<br>';
    //echo $value->{Continue} . ' f<br>';

    
    //echo '<br>submete: ' . $textopost . '<br>';
  }
  //var_dump($value);
}
echo '<br>' . $textopost . '<br>';
submitfb($textopost);

function submitfb($textopost){
  
echo '<br>' . $textopost . '<br>';
$url="https://m.facebook.com/checkpoint/?next=https://m.facebook.com/";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$ua = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.16 (KHTML, like Gecko) \ Chrome/24.0.1304.0 Safari/537.16';
//curl_setopt($ch, CURLOPT_USERAGENT, $ua);
//curl_setopt($ch, CURLOPT_POSTFIELDS, 'fb_dtsg=' . urlencode($fb1) . '&nh=' . urlencode($fb2) . '&submit[Continue]=Continue');
curl_setopt($ch, CURLOPT_POSTFIELDS, $textopost);
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
$fbMain = curl_exec($ch); // $a will contain all headers
curl_close($ch);

$pos1 = strpos($fbMain, "<head>");
$fbMod = str_replace('action="/login/checkpoint/"','action="checkpoint.php"', substr($fbMain,$pos1,strlen($fbMain)));
$fbMod = str_replace('action="/login/checkpoint/?next=https%3A%2F%2Fm.facebook.com%2F"','action="checkpoint.php"', $fbMod);

echo $fbMod;

}



?>
