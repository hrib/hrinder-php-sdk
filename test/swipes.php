<?php
require '../vendor/autoload.php';

$fb_id = getenv('FB_ID');
$token = getenv('FB_INDER_TOKEN');
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);

//var_dump($tinder->getUser());
$myId = '56c2eb45fdb7886152031092';
//$texto = 'You should try my sensual massage: 1 hour relaxing massage with music, oil and candles... It might include sensual stimulation with you feel comfortable with. Contact me on instagram (@london_for_her) or facebook: Xmassage UK. :)';
$texto = 'The therapy will take you into the heart and bloom of the flower of your femininity. An orgasm is not the goal, but rather sexual healing in whatever form it is expressed. The therapy is an opportunity to receive without any expectations. It is the absolute opportunity to experience the beauty and pleasure of sensual touch from another - totally as the receiver. Orgasmic delight is often experienced and has been described as ‘riding the wave’. Contacts: @london_for_her (instagram) or facebook.com/XmassageUK ';
//var_dump($tinder->sendMessage($userId, $message));
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>meio<br>';

$response = $tinder->recommendations();
//var_dump($response);
$candidatos = $response->results;
echo '<br>';

echo '<table border="1" style="font-family:arial; font-size:7px;">';
      foreach($candidatos as $candidato){
                  $tinder->like($candidato->_id);
                  echo '<tr>';
                  echo '<td>' . $candidato->_id . '</td>';
                  echo '<td>' . $candidato->name . '</td>';
                  echo '<td>' . $candidato->instagram->username . '</td>';
                  echo '</tr>';
      }
echo '</table>'

?>
