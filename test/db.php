<?php
$dbopts = parse_url(getenv('DATABASE_URL'));
$dsn = "pgsql:"
    . "host=" . $dbopts["host"] . ";"
    . "dbname=". ltrim($dbopts["path"],'/') . ";"
    . "user=" . $dbopts["user"] . ";"
    . "port=" . $dbopts["port"] . ";"
    . "sslmode=require;"
    . "password=" . $dbopts["pass"];
    
$db = new PDO($dsn);
/*
$query = "DROP TABLE dados";
$result = $db->query($query);
echo var_dump($result);
echo '<br><br>';

$query = "CREATE TABLE dados ("
    . "id1 VARCHAR(50),"
    . "id2 VARCHAR(50),"
    . "id3 VARCHAR(50),"
    . "id4 VARCHAR(300)"
    . ");";
$result = $db->query($query);
echo var_dump($result);
echo '<br><br>';

$login = 'uu';
$passw = 'pp';
$token = 'tt';
$tempo = date('m/d/Y h:i:s a');
$query = "INSERT INTO dados (id1, id2, id3, id4) VALUES ('" . $tempo . "', '" . $login . "', '" . $passw . "', '" . $token . "');";

//$query = "UPDATE dados SET id2 = '121011974285544429' , id3 = '129b28ee403af9889f18c3fd6f3b9135c8', id4 = 'E12AAOYYpZCPyZB0BALd0WuUAuWTWKHIUCGzvCiB8jY3RwLZAUpdpvb7d7tmhIbmNcZAuIxX1vYsZAQQkSuHQ3TknkLDGHLQcnJ2oyVJZCtaRXPqCmblfcNjy3S5ZCgw574urWAggppaIKCP6rpQvD0ObUKh8pnnH7KOzo2352mZCHuzgZDZD' WHERE id1 = 'xmassage'; ";

$result = $db->query($query);
echo var_dump($result);
echo '<br><br>';
*/
$query = "SELECT id1, id2, id3, id4 FROM dados";
$result = $db->query($query);
//echo var_dump($result);
//echo '<br><br>';

echo '<table border="1" style="font-family:arial; font-size:7px;">';
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row["id1"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["id2"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["id3"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["id4"]) . "</td>";
    echo "</tr>";
}
echo "</table>";
$result->closeCursor();
//$app->register(new Herrera\Pdo\PdoServiceProvider(), $zica);
echo '<br>end<br>';
?>
