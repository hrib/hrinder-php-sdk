<?php
require __DIR__ .'/../vendor/autoload.php';
//require '../src/Pecee/Http/Service/Tinder.php';

//$token_instagram = getenv('INS_APP_TOKEN'); //token burp para acesso ao instagram

$fb_id = getenv('FB_ID');
$token = getenv('FB_INDER_TOKEN');

$acc[1] = 'EAAGm0PX4ZCpsBAIX1BmJlpcy9cPIS5g7jPkFHoo0nDYBuvpZCvCbpUXjS20ywKgReY3Q4DBujga89ZAmMiuCVD6VXyQh6PdbuuEpG4H7IZBpOeAoo7oZCatYV66oeyxmnOebaAmYLPXV4ZB9GEKkNnjO5ZAHeuqAp6umtIgOaP7cc5b7gZBsi12MgAI4gJbIfZBVTNh8TU3w2LQmmoqbOZC4EO';
$accid[1] = '100009466980633';
$acc[2] = 'EAAGm0PX4ZCpsBAHyfxQwwPf9AHRrg6tDRhLLsZAodFUFjgZA1mb7f6qri09xu5sKwSbh9mKGjjl59DlHRDZBLZCaiZBQ7DIsufXc5HZB0ma3QBnznt7t7kV0gr8LL5ZAbR1K8QxynZAxZBlZCKsAtpEuDc9xI3Y1J1OUvFDTBenwr8K32U9LwrF6oZCcIr4ru2L3TU3mnAqO8373RmMx0j9EyEKv';
$accid[2] = '103155287060957';
$acc[3] = 'EAAGm0PX4ZCpsBAFD64x5c96rlylcIWzotLctJhwk7ZBAWpDQccET3LdfWEKnxRu2ZBKKCdqyznwYOctQWT8zBtoK1FDZBEWV1Hht3tRBAGrKYmrakAX7B76j4gktXakYAtDFZB0YYw3YDAn0ZBDT6xsaIvJaaIEoSwe1u8NfnBEIjoVQgue6dxBzshEBCYnysuc9yFSNuHu7VJzg0Oa9HG';
$accid[3] = '466083016879375';

$acc[4] = 'EMAWcWApDZBz1xfIWYtGOdGrMToQFcRbBLEhZAtxT6ZAol4xJxl9ZAqO3NZAr4hRzbbEyZAaqibRIjTks1qbDmSd6soA8OPXmcmxuXUZBDbeklAZDZD';
$accid[4] = '1563767356995716';
$acc[5] = 'EMAWeQpSKTSnhOZAxPq9OZC3wbYX8fPqunVZCVz6Xrk88PiISiYc8xMZAKtQmh2SCiH3s56LVMurGFa6ZBZCVIELxNcT1fFfDCsGjAI34GIZAXwZDZD';
$accid[5] = '213753052497819';
$acc[6] = 'EMAWc5CBB0Im9LJlNvZCZAQXeyrwMlX3dVlah1ZBXAMfWflIeRthBNSbXZCM8w7QT7RYamKBZBzYZAi3m42Jc5ZBDvYLNzZBZCBztwcYlybjLGZAiwZDZD';
$accid[6] = '364792117308069';
$acc[7] = 'EMAWd1V1AGSaGPgeJtUJTZCUeA9rG0eOsZCBaxZCKicfHf9awHa2wVWanOcrmWJpTXJLhGAgPat1OE6ZCkSY7xqiU5Yce9pcQqg9QDtvNADAZDZD';
$accid[7] = '2029132940706849';
$acc[8] = 'EMAWesZCdYEvPYUZCzJx9ijK7qYHzoD88jjAMsHoCiAOqXSV6JPtavjAMUwUyEz066BzIXRcrGbTtiROvxn7skcGnCMOdUMhIQ8erXA1OAZDZD';
$accid[8] = '1564043876995239';
$acc[9] = 'EMAWfW2ZBvAbg2IJ5XjaJZC0r7tqdWbQcylTpoogh4decv9SPBkX8nmYh1fCTE7uQEJZCd3ww9ADja84RggEpdkYkMlLgg8ZB70ZAH0haHwFQZDZD';
$accid[9] = '368719710232707';
$acc[10] = 'EMAWddXpy6v4YJdEckUwKe8VGYMGLnrFXvDBZC1NwzgnZBC90OZCpTw5LbsXJrCUdcz2vVeSsdT2AOBIbyCwZBIk11ApcvPlE6Dcg5TxS4egZDZD';
$accid[10] = '543036996035883';

$acc[11] = 'EMAWfZAxBho0g1ZALncgaXXWt5ilof9IOX4w9ceeumyZC0ZBHOyp6g1BGLqI6nheM3NgdYqHky6xfxZCHPNIzt9rk0OEPAmK1nB7H4u0LIexPkdcwo8d2fZCGVt0wBe0kvs4r2F4HBCiopxMvFcOqb7tm9ZClazH7M7oZD';
$accid[11] = '155925088481450';


$aleatorio = mt_rand(4,11);
//$aleatorio = 11;
$token = $acc[$aleatorio];
$fb_id = $accid[$aleatorio];
echo $token. '<br>';
echo $fb_id . '<br>';
echo $aleatorio . '<br>';


//$fb_id = getenv('FB_ID_MassTherr');
//$token = getenv('FB_INDER_TOKEN_MassTherr');
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);
//$tinder = new Tinder($fb_id, $token);

for ($x = 0; $x <= 2; $x++) {

      $response = $tinder->recommendations();
      var_dump($response);
      $candidatos = $response->results;
      echo '<br>';

      echo '<table border="1" style="font-family:arial; font-size:7px;">';
            foreach($candidatos as $candidato){

                        $swiperight = $tinder->like($candidato->_id);
                        print_r($swiperight);
                        //$instagram_id = 'nao achou';
                        //if(!empty($candidato->instagram->username)){
                        //      $instagram_id = PegaUserID($candidato->instagram->username, $token_instagram);
                        //}
                        //$relacao = 'nao achou';
                        //if($instagram_id !== 'nao achou'){
                        //      $relacao = modificaRelacao($instagram_id, $token_instagram, 'follow');
                        //}
                        //set_time_limit(10);
                        //sleep(1);
                        echo '<tr>';
                        echo '<td>' . $candidato->_id . '</td>';
                        echo '<td>' . $candidato->name . '</td>';
                        echo '<td>' . $swiperight->match->_id . '</td>';
                        //echo '<td>' . $candidato->instagram->username . '</td>';
                        //echo '<td>' . $instagram_id . '</td>';
                        //echo '<td>' . $relacao . '</td>';
                        echo '</tr>';
            }
      echo '</table>';
      
      
} 


function PegaUserID($username, $token){
    $url = 'https://api.instagram.com/v1/users/search?q='.$username.'&access_token='.$token;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    $resjson = json_decode($response);
    //var_dump($resjson);
    foreach($resjson->data as $usuario){
          if($usuario->username == $username){return $usuario->id;} 
    }
    return 'nao achou';
}


function modificaRelacao($userID, $token, $action){
  $id_to_follow = $userID;
  $url = 'https://api.instagram.com/v1/users/'.$id_to_follow.'/relationship';
  $data = array('action' => $action, 'access_token' => $token);
  
  // use key 'http' even if you send the request to https://...
  $options = array(
      'http' => array(
          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
          'method'  => 'POST',
          'content' => http_build_query($data)
      )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  if ($result === FALSE) { /* Handle error */ }
  $resjson = json_decode($result);
  return $resjson->data->outgoing_status;
}

?>
