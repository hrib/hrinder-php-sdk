<?php
require '../vendor/autoload.php';

$fb_id = getenv('FB_ID');
$token = getenv('FB_INDER_TOKEN');
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);

//var_dump($tinder->getUser());

//var_dump($tinder->updates());
echo '<br>';

echo '<table border="1" style="font-family:arial; font-size:7px;">';
$response = $tinder->updates();
foreach($response->matches as $match){
      var_dump($match);
      echo '<tr>';
      echo '<td>' . $match['_id'] . '</td>';
      echo '<td>';
} 
echo '</table>'

?>
