<?php
require '../vendor/autoload.php';

$fb_id = getenv('FB_ID');
$token = getenv('FB_INDER_TOKEN');
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);

//var_dump($tinder->getUser());

//var_dump($tinder->updates());
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>meio<br>';

$response = $tinder->updates();
//var_dump($response->matches);
$matches = $response->matches;
echo '<br>';

echo '<table border="1" style="font-family:arial; font-size:7px;">';
foreach($matches as $match){
      foreach($match->messages as $mensagens)
      echo '<br>';
      echo '<tr>';
      echo '<td>' . $match->_id . '</td>';
      echo '<td>' . $mensagens->message . '</td>';
      echo '<td>' . $mensagens->sent_date . '</td>';
      echo '<td>';
      }
} 
echo '</table>'

?>
