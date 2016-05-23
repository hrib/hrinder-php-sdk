<?php
require '../vendor/autoload.php';

$token_instagram = getenv('INS_APP_TOKEN'); //token burp para acesso ao instagram

$fb_id = getenv('FB_ID');
$token = getenv('FB_INDER_TOKEN');
$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);

$response = $tinder->recommendations();
//var_dump($response);
$candidatos = $response->results;
echo '<br>';

echo '<table border="1" style="font-family:arial; font-size:7px;">';
      foreach($candidatos as $candidato){
                  
                  $tinder->like($candidato->_id);
                  $instagram_id = 'nao achou';
                  if($candidato->instagram->username !== ''){
                        echo 'aqui'.$candidato->instagram->username.'fim';
                        $instagram_id = PegaUserID($candidato->instagram->username, $token_instagram);
                  }
                  $relacao = 'nao achou';
                  if($instagram_id !== 'nao achou'){
                        $relacao = modificaRelacao($instagram_id, $token_instagram, 'follow');
                  }
                  set_time_limit(10);
                  sleep(1);
                  echo '<tr>';
                  echo '<td>' . $candidato->_id . '</td>';
                  echo '<td>' . $candidato->name . '</td>';
                  echo '<td>' . $candidato->instagram->username . '</td>';
                  echo '<td>' . $instagram_id . '</td>';
                  echo '<td>' . $relacao . '</td>';
                  echo '</tr>';
      }
echo '</table>';

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
