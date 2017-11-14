<?php
 
$query = $_POST['sql'];
$query2 = $_POST['sql2'];
?>

<h2>Input</h2>
<form action="gerencia.php" method="post" enctype="multipart/form-data" >
  <div>
    <textarea name="content" rows="10" cols="200">
DELETE FROM tl_usuarios WHERE id = 1; 
CREATE TABLE tl_usuarios (id SERIAL, tempo TIMESTAMP, t_id VARCHAR(50), t_token VARCHAR(200)); 
DROP TABLE tl_usuarios; 
SELECT * FROM tl_usuarios ORDER BY id; 
INSERT INTO tl_usuarios (tempo, t_id, t_token) VALUES (now(), '1234', 'tk2134');
  </textarea></div>
  <div><textarea name="sql" rows="5" cols="200"><?php echo $query; ?></textarea></div>
  <div><input type="submit" value="Input"></div>
</form>

<form action="gerencia.php" method="post" enctype="multipart/form-data" >
  <div><textarea name="sql2" rows="5" cols="200">SELECT * FROM tl_usuarios</textarea></div>
  <div><input type="submit" value="Lista Cadastro"></div>
</form>



<h2>Entries</h2>
  
  
<?php
echo '<table border="1" style="font-family:arial; font-size:7px;">';  
echo '<tr>';
echo '<td>';
if (isset($query)) {  
  $dbopts = parse_url(getenv('DATABASE_URL'));
  $dsn = "pgsql:"
      . "host=" . $dbopts["host"] . ";"
      . "dbname=". ltrim($dbopts["path"],'/') . ";"
      . "user=" . $dbopts["user"] . ";"
      . "port=" . $dbopts["port"] . ";"
      . "sslmode=require;"
      . "password=" . $dbopts["pass"];
  $db = new PDO($dsn);
  $result = $db->query($query);
  //print_r($query);
  //echo '<br>';
  //echo '<br>';
  //print_r($result);
  //echo '<br>';
  //echo '<br>';
  //print_r($result->fetchAll());
  //echo '<br>';
  //echo '<br>';
  echo '<table border="1" style="font-family:arial; font-size:7px;">';
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      foreach($row as $item) {
        echo "<td>" . htmlspecialchars($item) . "</td>";
      }
      echo "</tr>";
  }
  echo "</table>";
  $result->closeCursor();
}
echo '</td>';
echo '<td>';
if (isset($query2)) {  
  $dbopts = parse_url(getenv('DATABASE_URL'));
  $dsn = "pgsql:"
      . "host=" . $dbopts["host"] . ";"
      . "dbname=". ltrim($dbopts["path"],'/') . ";"
      . "user=" . $dbopts["user"] . ";"
      . "port=" . $dbopts["port"] . ";"
      . "sslmode=require;"
      . "password=" . $dbopts["pass"];
  $db = new PDO($dsn);
  $result = $db->query($query2);
  echo '<table border="1" style="font-family:arial; font-size:7px;">';
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      echo "<tr>";
      foreach($row as $item) {
        echo "<td>" . htmlspecialchars($item) . "</td>";
      }
      echo "</tr>";
  }
  echo "</table>";
  $result->closeCursor();
}
echo '</td>';
echo '</tr>';
echo "</table>";
?>
