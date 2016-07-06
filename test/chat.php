<?php
require __DIR__ .'/../vendor/autoload.php';

$fb_id = getenv('FB_ID_MassTherr6');
$token = getenv('FB_INDER_TOKEN_MassTherr6');
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);

$user_dados = $tinder->getUser();
$myId = $user_dados->_id;

echo '<br>Inico<br>';

$response = $tinder->updates();
$matches = $response->matches;
echo '<br>';

//echo '<table border="1" style="font-family:arial; font-size:7px;">';
foreach($matches as $match){
      echo '<table border="1" style="font-family:arial; font-size:7px;">';
      foreach($match->messages as $mensagens){
            
            if($myId == $mensagens->from){$amigo = $mensagens->to; $esquerda = "";  $direita = $mensagens->message;}
            if($myId == $mensagens->to){$amigo = $mensagens->from; $esquerda = $mensagens->message; $direita = "";}
            
            echo '<tr>';
            //echo '<td>' . $match->_id . '</td>';
            echo '<td>' . $mensagens->sent_date . '</td>';
            //echo '<td>' . $amigo . '</td>';
            echo '<td>' . $esquerda . '</td>';
            echo '<td>' . $direita . '</td>';
            //echo '<td>' . $myId . '</td>';
            echo '</tr>';
      }
      echo '<tr>';
      echo '<form action="envia.php">';
      echo '>>>>';
      echo '<input type="text" name="message" >';
      echo '<input type="submit" value="Submit">';
      echo '</form>'; 
      echo '</table><br>';
      echo '</tr>';

}
       
//echo '</table>';

echo '<br>Fim<br>';

// var_dump($tinder->sendMessage($match->_id, $texto));


?>
