<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<div style="text-align:right">   
<a href="logout.php" style="font-family:arial; font-size:9px;">Logout</a>
</div>
<br>

<?php
session_start();

//require __DIR__ .'/../vendor/autoload.php';

require __DIR__ .'/vendor/autoload.php';


$fb_id = getenv('FB_ID');

//$token = $_SESSION["token"];

$token = getenv('FB_INDER_TOKEN');
$_SESSION["token"] = $token;

//$token = $_GET["tk"];
//$fb_id = $_GET["fb"];

//echo 'fb_id:'. $fb_id;
//echo 'token:'. $token;
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);
var_dump($tinder);

$user_dados = $tinder->getUser();
var_dump($user_dados);

$myId = $user_dados->_id;
echo '<br>Id3:' . $myId;
echo '<br>Inicio<br>';

$response = $tinder->updates();
//var_dump($response->matches);
$matches = $response->matches;
echo '<br>';
echo '<div class="testWrapper">';
//echo '<table border="1" style="font-family:arial; font-size:7px;">';
//$num = 10000;
foreach($matches as $match){
      
      //foreach($match->person->photos as $foto){
      //      echo '<img src='. $foto->url .' style="width:30px;height:30px;">';
      //}  
      //$num =  $num - 1;
      $max = count($match->messages) - 1;
      $timestamp = -strtotime($match->messages[$max]->sent_date);
      if($max == -1){$timestamp = 0;}
      echo '<div id =' . $match->_id . ' class="test" data-percentage=' . $timestamp . ' style="height:250px;width:702px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;">';
      //echo $timestamp . ':' . $max;
      echo '<img src='. $match->person->photos[0]->url .' style="width:30px;height:30px;">';
      echo  '<font style="font-family:arial; font-size:9px;"> ' . $match->person->name . '</font>';
      echo '<div name =table style="height:150px;width:700px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">';
      echo '<table border="0" style="font-family:arial; font-size:7px;">';
      echo '<tr>';
      echo '<td width="100"></td>';
      echo '<td width="300"></td>';
      echo '<td width="300"></td>';
      echo '</tr>';
      foreach($match->messages as $mensagens){
            var_dump($mensagens);
            if($myId == $mensagens->from){$amigo = $mensagens->to; $esquerda = "";  $direita = $mensagens->message;}
            if($myId == $mensagens->to){$amigo = $mensagens->from; $esquerda = $mensagens->message; $direita = "";}
            
            echo '<tr>';
            //echo '<td>' . $match->_id . '</td>';
            echo '<td>' . $mensagens->sent_date . '</td>';
            //echo '<td>' . $amigo . '</td>';
            $esquerda = esconde($esquerda);
            $direita = esconde($direita);
            echo '<td>' . $esquerda . '</td>';
            echo '<td>' . $direita . '</td>';
            //echo '<td>' . $myId . '</td>';
            echo '</tr>';
      }
      //if($direita == ""){echo '<table bgcolor="#00FF00">';}
      if($direita == ""){echo '<tr style="background-color:#00FF00;"><td>...</td><td></td><td></td></tr>';}
      echo '</table>';
      echo '</div>';
      echo '<form name="myform" action="envia.php" onsubmit="DoSubmit();">';
      echo '<input type="hidden" name="userid" value=' . $match->_id . '>';
      echo '<input type="text" name="message" style="font-family:arial; font-size:7px; width: 600px; margin-left: 10px; margin-top: 10px;">';
      echo '<input type="submit" value="Send" name="botaoenvia" style="font-family:arial; font-size:7px; margin-left: 10px; margin-top: 10px;">';
      echo '</form>'; 
      echo '<br><br>';
      echo '</div>';
      //echo '<script>';
      //echo 'var objDiv = document.getElementById("' . $match->_id . '");';
      //echo 'var objDiv = document.getElementById("table");';
      //echo 'objDiv.scrollTop = objDiv.scrollHeight;';
      //echo '</script>';
}
echo '</div>';       

function esconde($texto){

      $texto = str_replace('a','£1£',$texto);
      $texto = str_replace('e','£2£',$texto);
      $texto = str_replace('i','£3£',$texto);
      $texto = str_replace('o','£4£',$texto);
      $texto = str_replace('u','£5£',$texto);
      
      return $texto;
}


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

      
      $( document ).ready(function() {
            replaceText('£1£', 'a', 'g');
            replaceText('£2£', 'e', 'g');
            replaceText('£3£', 'i', 'g');
            replaceText('£4£', 'o', 'g');
            replaceText('£5£', 'u', 'g');
            
            var $wrapper = $('.testWrapper');
            $wrapper.find('.test').sort(function (a, b) {
                return +a.dataset.percentage - +b.dataset.percentage;
            })
            .appendTo( $wrapper );

            var inputs = document.getElementsByName("table"); for(var i=0; i<inputs.length;i++) { inputs[i].scrollTop = inputs[i].scrollHeight }; 
            //console.log(inputs.length);

      });

      function replaceText(text, newText, flags) {
        var matcher = new RegExp(text, flags);
        console.log(matcher);
        var elems = document.getElementsByClassName('test'), i;
        console.log(elems.length);
        for (i = 0; i < elems.length; i++){
            elems[i].innerHTML = elems[i].innerHTML.replace(matcher, newText);
        }
      }
      
      function DoSubmit(){
        encodeText('a', '£1£', 'g');
        encodeText('e', '£2£', 'g');
        encodeText('i', '£3£', 'g');
        encodeText('o', '£4£', 'g');
        encodeText('u', '£5£', 'g');
        return true;
      }
      
      function encodeText(text, newText, flags) {
        var matcher = new RegExp(text, flags);
        var elems = document.getElementsByName('message'), i;
        for (i = 0; i < elems.length; i++){
            elems[i].value = elems[i].value.replace(matcher, newText);
        }
      }

      
</script>

