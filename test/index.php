<?php
require __DIR__ .'/../vendor/autoload.php';

/*
EAAGm0PX4ZCpsBAIX1BmJlpcy9cPIS5g7jPkFHoo0nDYBuvpZCvCbpUXjS20ywKgReY3Q4DBujga89ZAmMiuCVD6VXyQh6PdbuuEpG4H7IZBpOeAoo7oZCatYV66oeyxmnOebaAmYLPXV4ZB9GEKkNnjO5ZAHeuqAp6umtIgOaP7cc5b7gZBsi12MgAI4gJbIfZBVTNh8TU3w2LQmmoqbOZC4EO
100009466980633

EAAGm0PX4ZCpsBAHyfxQwwPf9AHRrg6tDRhLLsZAodFUFjgZA1mb7f6qri09xu5sKwSbh9mKGjjl59DlHRDZBLZCaiZBQ7DIsufXc5HZB0ma3QBnznt7t7kV0gr8LL5ZAbR1K8QxynZAxZBlZCKsAtpEuDc9xI3Y1J1OUvFDTBenwr8K32U9LwrF6oZCcIr4ru2L3TU3mnAqO8373RmMx0j9EyEKv
103155287060957

EAAGm0PX4ZCpsBAFD64x5c96rlylcIWzotLctJhwk7ZBAWpDQccET3LdfWEKnxRu2ZBKKCdqyznwYOctQWT8zBtoK1FDZBEWV1Hht3tRBAGrKYmrakAX7B76j4gktXakYAtDFZB0YYw3YDAn0ZBDT6xsaIvJaaIEoSwe1u8NfnBEIjoVQgue6dxBzshEBCYnysuc9yFSNuHu7VJzg0Oa9HG
466083016879375


EMAWdijLZBaa9EwbdDimZBqzTsasCMizTZCa3pe2QDcnJZCU0a1W7gWBw2av6hUtCqYccxChGKGBZCIMtXnHfGEW290BO4XgZAdM0uEFTkNJHwZDZD
213753052497819

EMAWeGQgHLPauid5yr8LwNe6zIZB5NcdckgAbIgByyKb06tgwnccS1ZAgZB4ZCna3oCkdYmwDAyL7fhmtWhBAE18piCvZBfSSZAqUeungtvACQZDZD
364792117308069


EMAWd1V1AGSaGPgeJtUJTZCUeA9rG0eOsZCBaxZCKicfHf9awHa2wVWanOcrmWJpTXJLhGAgPat1OE6ZCkSY7xqiU5Yce9pcQqg9QDtvNADAZDZD
2029132940706849

EMAWesZCdYEvPYUZCzJx9ijK7qYHzoD88jjAMsHoCiAOqXSV6JPtavjAMUwUyEz066BzIXRcrGbTtiROvxn7skcGnCMOdUMhIQ8erXA1OAZDZD
1564043876995239

EMAWfW2ZBvAbg2IJ5XjaJZC0r7tqdWbQcylTpoogh4decv9SPBkX8nmYh1fCTE7uQEJZCd3ww9ADja84RggEpdkYkMlLgg8ZB70ZAH0haHwFQZDZD
368719710232707

EMAWddXpy6v4YJdEckUwKe8VGYMGLnrFXvDBZC1NwzgnZBC90OZCpTw5LbsXJrCUdcz2vVeSsdT2AOBIbyCwZBIk11ApcvPlE6Dcg5TxS4egZDZD
543036996035883
*/
$fb_id = getenv('FB_ID');
$token = getenv('FB_INDER_TOKEN');

$token = 'EMAWfW2ZBvAbg2IJ5XjaJZC0r7tqdWbQcylTpoogh4decv9SPBkX8nmYh1fCTE7uQEJZCd3ww9ADja84RggEpdkYkMlLgg8ZB70ZAH0haHwFQZDZD';
$fb_id = '368719710232707';
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
$texto = 'Hey... There will be a group meeting for first timers bi-curious girls. If you want to know more, text the hoster/adm on WhatsApp: +44 7537 192513';


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
