<?php
require '../vendor/autoload.php';

$fb_id = getenv('FB_ID');
$token = getenv('FB_INDER_TOKEN');
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);

//var_dump($tinder->getUser());
$myId = '56c2eb45fdb7886152031092';
//$texto = 'You should try my sensual massage: 1 hour relaxing massage with music, oil and candles... It might include sensual stimulation with you feel comfortable with. Contact me on instagram (@london_for_her) or facebook: Xmassage UK. :)';
$texto = 'Pls if you want to know more, contact me on Instagram or Facebook. Thx :)';
//var_dump($tinder->sendMessage($userId, $message));
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
      $mandou = 0;
      foreach($match->messages as $mensagens){
            
            if($myId == $mensagens->from){$amigo = $mensagens->to; $esquerda = "";  $direita = $mensagens->message;}
            if($myId == $mensagens->to){$amigo = $mensagens->from; $esquerda = $mensagens->message; $direita = "";}
            
            echo '<tr>';
            echo '<td>' . $match->_id . '</td>';
            echo '<td>' . $mensagens->sent_date . '</td>';
            echo '<td>' . $amigo . '</td>';
            echo '<td>' . $esquerda . '</td>';
            echo '<td>' . $direita . '</td>';
            echo '<td>' . $myId . '</td>';
            echo '</tr>';
            if (strpos($mensagens->message, 'azazaza') !== false) {
                  $mandou = 1;
            }
      }
      if($mandou == 0){
            set_time_limit(10); 
            sleep(1);
            var_dump($tinder->sendMessage($match->_id, $texto));
      }
} 
echo '</table>'

?>
