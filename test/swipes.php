<?php
require '../vendor/autoload.php';

$token_instagram = getenv('INS_APP_TOKEN'); //token burp para acesso ao instagram

$fb_id = getenv('FB_ID');
$token = getenv('FB_INDER_TOKEN');
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);

$response = $tinder->recommendations();
//var_dump($response);
$candidatos = $response->results;
echo '<br>';

echo '<table border="1" style="font-family:arial; font-size:7px;">';
      foreach($candidatos as $candidato){
                  $tinder->like($candidato->_id);
                  PegaUserID($candidato->_id, $token_instagram);
                  echo '<tr>';
                  echo '<td>' . $candidato->_id . '</td>';
                  echo '<td>' . $candidato->name . '</td>';
                  echo '<td>' . $candidato->instagram->username . '</td>';
                  echo '</tr>';
      }
echo '</table>'

function PegaUserID($username, $token){
    $url = 'https://api.instagram.com/v1/users/search?q='.$username.'&access_token='.$token;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    $resjson = json_decode($response);
    var_dump($resjson);
}

?>
