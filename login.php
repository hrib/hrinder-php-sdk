<?php

unlink('mirazmac_cookie.txt');

      echo '<form action="fb_login.php" method="post">';
      echo '<input type="text" name="user" style="font-family:arial; font-size:7px; width: 600px; margin-left: 10px; margin-top: 10px;">';
      echo '<input type="password" name="password" style="font-family:arial; font-size:7px; width: 600px; margin-left: 10px; margin-top: 10px;">';
      echo '<input type="submit" value="Send" style="font-family:arial; font-size:7px; margin-left: 10px; margin-top: 10px;">';
      echo '</form>'; 
      
?>