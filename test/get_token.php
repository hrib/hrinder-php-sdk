<?php 

$url="http://libero-news.it.feedsportal.com/c/34068/f/618095/s/2e34796f/l/0L0Sliberoquotidiano0Bit0Cnews0C12735670CI0Esaggi0Eper0Ele0Eriforme0Ecostituzionali0EChiaccherano0Ee0Eascoltano0Bhtml/story01.htm";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$a = curl_exec($ch); // $a will contain all headers

$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL); // This is what you need, it will return you the last effective URL

// Uncomment to see all headers
/*
echo "<pre>";
print_r($a);echo"<br>";
echo "</pre>";
*/

echo $url; // Voila
?>
