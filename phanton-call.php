<?php
echo 'oi';
$pathToPhatomJs = 'bin/phantomjs';
$pathToJsScript = dirname(__FILE__). '/phantom-webserver.js';
$stdOut = exec(sprintf('%s %s', $pathToPhatomJs, $pathToJsScript), $out);
echo $stdOut; 
?>
