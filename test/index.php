<?php
require __DIR__ .'/../vendor/autoload.php';

//$fb_id = getenv('FB_ID');
//$token = getenv('FB_INDER_TOKEN');
$fb_id = getenv('FB_ID_MassTherr6');
$token = getenv('FB_INDER_TOKEN_MassTherr6');
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);

//var_dump($tinder->getUser());
$user_dados = $tinder->getUser();
$myId = $user_dados->_id;
//$myId = '57443822d531d95a13b018df';
//$texto = 'You should try my sensual massage: 1 hour relaxing massage with music, oil and candles... It might include sensual stimulation with you feel comfortable with. Contact me on instagram (@london_for_her) or facebook: Xmassage UK. :)';
//$texto = 'The therapy will take you into the heart and bloom of the flower of your femininity. An orgasm is not the goal, but rather sexual healing in whatever form it is expressed. The therapy is an opportunity to receive without any expectations. It is the absolute opportunity to experience the beauty and pleasure of sensual touch from another - totally as the receiver. Orgasmic delight is often experienced and has been described as ‘riding the wave’.';
//$texto = 'When in doubt. Do it. - Oliver Wendell Holmes';
$texto = 'To keep the body in good health is a duty, otherwise we shall not be able to keep our mind strong and clear. ~Buddha ';
$texto = 'Of course it hurts, it’s a spanking. How else would it work? ― Breanna Hayse, Time Out London'; 
$texto = 'For women who want to enjoy the firm yet the tender touch of a man without the need to perform or give back sexually. Book your sensual massage. :)'; 
//$texto = 'Before leaving her home every day, she must be wearing an item of ownership (necklace, bracelet, anklet, choker, or ring) that reminds her constantly of Master. The item must be worn in plain sight in public for other to see.';
$texto = 'Before leaving for work in the morning, she must text me a photo of her outfit. This is not to control her wardrobe in anyway but to be able to compliment her on how sexy and beautiful she looks at the beginning of her day.';
$texto = 'Sensual Massage is a wonderful way in which therapeutic Massage is blended with eroticism and allows ladies to release daily stresses, emotional and physical tensions away. Book your sensual massage. :)';
//$texto = 'I want you to taste me.';
//$texto = 'how are you doing today my sweetie babygirl?';
//$texto = 'yeeaahhh!!! You matched me back!!! :) :D';
$texto = 'Left the office!!! Time for a beer! :D';

//$texto = 'Every day after work, when she changes out of her work clothes, she must insert the Ben Wa balls into her pussy and wear them until bedtime. She must wear the ben wa balls for all social, exercise, yoga or work out activities.';

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
            if (strpos($mensagens->message, 'aasdfsdfsadf') !== false) {
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
