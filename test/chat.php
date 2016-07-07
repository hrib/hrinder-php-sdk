<?php
//session_start();

require __DIR__ .'/../vendor/autoload.php';

$fb_id = getenv('FB_ID_MassTherr6');
$token = getenv('FB_INDER_TOKEN_MassTherr6');
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);
//$_SESSION["hrinder"] = $tinder;

$user_dados = $tinder->getUser();
$myId = $user_dados->_id;

echo '<br>Inico<br>';

$response = $tinder->updates();
//var_dump($response->matches);
$matches = $response->matches;
echo '<br>';

//echo '<table border="1" style="font-family:arial; font-size:7px;">';
foreach($matches as $match){
      echo $match->person->name;
      //echo $match->person->photos->processedFiles->url;
      //var_dump($match->person->photos[0]->url);
      echo '<img src='. $match->person->photos[0]->url .' style="width:30px;height:30px;">';
      //foreach($match->person->photos as $foto){
      //      echo '<img src='. $foto->url .' style="width:30px;height:30px;">';
      //}  
      echo '<div style="height:120px;width:700px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">';
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
      echo '</table>';
      echo '</div>';
      echo '<form action="envia.php">';
      echo '<input type="text" name="userid" value=' . $match->_id . '>';
      echo '<input type="text" name="message" >';
      echo '<input type="submit" value="Submit">';
      echo '</form>'; 
}
       
//echo '</table>';

echo '<br>Fim<br>';

// var_dump($tinder->sendMessage($match->_id, $texto));


?>
