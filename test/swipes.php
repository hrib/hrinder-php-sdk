<?php
require __DIR__ .'/../vendor/autoload.php';

$dbopts = parse_url(getenv('DATABASE_URL'));
$dsn = "pgsql:"
  . "host=" . $dbopts["host"] . ";"
  . "dbname=". ltrim($dbopts["path"],'/') . ";"
  . "user=" . $dbopts["user"] . ";"
  . "port=" . $dbopts["port"] . ";"
  . "sslmode=require;"
  . "password=" . $dbopts["pass"];
$db = new PDO($dsn);
$query = "SELECT t_id, t_token FROM tl_usuarios;";
$result = $db->query($query);
//echo var_dump($result);
$res_fetch = $result->fetchAll();
//echo var_dump($res_fetch);
//echo '<br><br>';
//echo $res_fetch[1]['t_id'];
//echo '<br>';
//echo $res_fetch[1]['t_token'];
$result->closeCursor();

$max = sizeof($res_fetch);
//echo '<br>'. $max;
$aleatorio = mt_rand(0, $max - 1);
//$aleatorio = 12;
$token = $res_fetch[$aleatorio]['t_token'];
$fb_id = $res_fetch[$aleatorio]['t_id'];
echo $token. '<br>';
echo $fb_id . '<br>';
echo $aleatorio . '<br>';


$tinder = new \Pecee\Http\Service\Tinder($fb_id, $token);
//var_dump($tinder);
//echo '<br><br>meu profile<br>';      
//$response = $tinder->meuprofile();
//var_dump($response);
//echo '<br><br>meta<br>';      
//$response = $tinder->meta();
//var_dump($response);

echo '<br><br>Ping Location<br>';   
//$gps_rand = rand(1,100)/10000000;
//$response = $tinder->updateLocation(51.4758 + $gps_rand, -0.2123 + $gps_rand);
//var_dump($response); 
echo '<br><br><br><br>';      


echo '<br><br>Ping Time<br>';      
//$lastActivityTime = date('Y-m-d\TH:i:s\Z');
//echo 'Date=' . $lastActivityTime . '<br>';
//$response = $tinder->updates($lastActivityTime);
//var_dump($response); 
echo '<br><br><br><br>';      



for ($x = 0; $x <= 1; $x++) {

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
                        set_time_limit(10);
                        sleep(2);
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
