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
      
      //foreach($match->person->photos as $foto){
      //      echo '<img src='. $foto->url .' style="width:30px;height:30px;">';
      //}  
      echo '<div id =' . $match->_id . ' style="width:702px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;">';
      echo '<img src='. $match->person->photos[0]->url .' style="width:30px;height:30px;">';
      echo  '<font style="font-family:arial; font-size:9px;"> ' . $match->person->name . '</font>';
      echo '<div id =' . $match->_id . 'table style="height:150px;width:700px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">';
      echo '<table border="0" style="font-family:arial; font-size:7px;">';
      echo '<tr>';
      echo '<td width="100"></td>';
      echo '<td width="300"></td>';
      echo '<td width="300"></td>';
      echo '</tr>';
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
      echo '<input type="hidden" name="userid" value=' . $match->_id . '>';
      echo '<input type="text" name="message" style="font-family:arial; font-size:7px; width: 600px; margin-left: 10px">';
      echo '<input type="submit" value="Submit">';
      echo '</form>'; 
      echo '</div>';
      echo '<br><br>';
      echo '<script>';
      //echo 'var objDiv = document.getElementById("' . $match->_id . '");';
      echo 'var objDiv = document.getElementById("' . $match->_id . 'table");';
      echo 'objDiv.scrollTop = objDiv.scrollHeight;';
      echo '</script>';
}
       
//echo '</table>';

echo '<br>Fim<br>';

// var_dump($tinder->sendMessage($match->_id, $texto));


?>
