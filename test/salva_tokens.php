<?php 
$token = $_GET['token'];
$id = $_GET['id'];
?>

<h2>Input</h2>
<form action="salva_tokens.php" method="get" enctype="multipart/form-data" >
<div><textarea name="token" rows="1" cols="200"><?php echo $token; ?></textarea></div>
<div><textarea name="id" rows="1" cols="200"><?php echo $id; ?></textarea></div>
<div><input type="submit" value="Input"></div>
</form>



<?php
if (isset($token)) { 
    $dbopts = parse_url(getenv('DATABASE_URL'));
    $dsn = "pgsql:"
        . "host=" . $dbopts["host"] . ";"
        . "dbname=". ltrim($dbopts["path"],'/') . ";"
        . "user=" . $dbopts["user"] . ";"
        . "port=" . $dbopts["port"] . ";"
        . "sslmode=require;"
        . "password=" . $dbopts["pass"];

    $db = new PDO($dsn);
    $tempo = date('m/d/Y h:i:s a');
    $query = "INSERT INTO tl_usuarios (tempo, t_id, t_token) VALUES ('" . $tempo . "', '" . $id . "', '" . $token . "');";
    //echo var_dump($query);
    //echo '<br><br>';
    $result = $db->query($query);
    echo var_dump($result);
    //echo '<br><br>';
    $result->closeCursor();
    //$app->register(new Herrera\Pdo\PdoServiceProvider(), $zica);
    //echo '<br>end<br>';
}

?>
