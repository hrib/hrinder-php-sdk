<?php
require __DIR__ .'/../vendor/autoload.php';


$fb_id = getenv('FB_ID');
$token = getenv('FB_INDER_TOKEN');
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);
$user_dados = $tinder->meta();
$myId = $user_dados->user->_id;

//$texto = 'You should try my sensual massage: 1 hour relaxing massage with music, oil and candles... It might include sensual stimulation with you feel comfortable with. Contact me on instagram (@london_for_her) or facebook: Xmassage UK. :)';
//$texto = 'The therapy will take you into the heart and bloom of the flower of your femininity. An orgasm is not the goal, but rather sexual healing in whatever form it is expressed. The therapy is an opportunity to receive without any expectations. It is the absolute opportunity to experience the beauty and pleasure of sensual touch from another - totally as the receiver. Orgasmic delight is often experienced and has been described as ‘riding the wave’.';
$texto = 'When in doubt. Do it. - Oliver Wendell Holmes';
$texto = 'To keep the body in good health is a duty, otherwise we shall not be able to keep our mind strong and clear. ~Buddha ';
$texto = 'Of course it hurts, it’s a spanking. How else would it work? ― Breanna Hayse, Time Out London'; 
$texto = 'For women who want to enjoy the firm yet the tender touch of a man without the need to perform or give back sexually. Book your sensual massage. :)'; 
//$texto = 'Before leaving her home every day, she must be wearing an item of ownership (necklace, bracelet, anklet, choker, or ring) that reminds her constantly of Master. The item must be worn in plain sight in public for other to see.';
$texto = 'Sensual Massage is a wonderful way in which therapeutic Massage is blended with eroticism and allows ladies to release daily stresses, emotional and physical tensions away. Book your sensual massage. :)';
//$texto = 'I want you to taste me.';
$texto = 'how are you doing today my sweetie babygirl?';
$texto = 'Hi! Would you mind if I make you my Sub?';
$texto = 'I’m going to tie you up and put you on your knees, babe. And you’re going to hate how much you love it.';
//$texto = 'Before leaving for work in the morning, you must text me a photo of your outfit. This is not to control your wardrobe in anyway but to be able to compliment you on how sexy and beautiful you look at the beginning of your day.';
//$texto = 'Morning!!! I need a relaxing massage, can you be my masseuse!?';
//$texto = 'Hello!! So.. when am I getting my massage? :)';
//$texto = 'Every day after work, when she changes out of her work clothes, she must insert the Ben Wa balls into her pussy and wear them until bedtime. She must wear the ben wa balls for all social, exercise, yoga or work out activities.';
$texto = 'Oi! O que acha da ideia!? :)';
$texto = 'Hi! How are you today? Did you read my profile... Are you looking for a massage? :)';
$texto = 'Tinder will soon block me for advertising... so if you need to contact me, Im on facebook. facebook.com / LondonMassageForHer . ;)';
$texto = 'Hello! I would like to invite you to check my services on my business page: facebook.com / LondonMassageForHer . ;)';
$texto = 'Hey... There will be a group meeting for first timers bi-curious girls. I`m on WhatsApp if you want to know more: +44 7537 192513';


//var_dump($tinder->sendMessage($userId, $message));
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>meio<br>';

$response = $tinder->updates();
//var_dump($response->matches);
$matches = $response->matches;
echo '<br>';
$mandou = 0;  
echo '<table border="1" style="font-family:arial; font-size:7px;">';
foreach($matches as $match){
      $mandou = 0;  ///switch 0/1
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
            if (strpos($mensagens->message, 'a') !== false) {
                  $mandou = 1;
            }
            if (strpos($match->person->name, 'Mariline') !== false) {
                  //$mandou = 1;
            }
            if (strpos($match->person->name, 'Michele') !== false) {
                  //$mandou = 1;
            }
            if (strpos($match->person->name, 'Liliane') !== false) {
                  //$mandou = 1;
            }
            if (strpos($match->person->name, 'Valentina') !== false) {
                  //$mandou = 1;
            }
            $ultima_msg = $mensagens->message;
      }
      //mandar seu minha ultima msg teve isso:
      if (strpos($ultima_msg, 'sexo casual') !== false) {
            $mandou = 0;
      }
            
      
      if($mandou == 0){
            set_time_limit(10); 
            sleep(1);
            var_dump($tinder->sendMessage($match->_id, $texto));
      }
} 
echo '</table>'

?>
