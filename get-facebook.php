<?php
echo 'oi';
$pathToPhatomJs = 'bin/phantomjs';
$pathToJsScript = dirname(__FILE__). '/browser_fb.js';
//$varin1 = getenv('email');
//$varin2 = getenv('pass');
//$stdOut = exec(sprintf('%s %s %s %s', $pathToPhatomJs,  $pathToJsScript, $varin1, $varin2), $out);
//$stdOut = exec(sprintf('%s %s %s %s %s', $pathToPhatomJs, '--proxy=157.7.152.61:3128', $pathToJsScript, $varin1, $varin2), $out);
//echo $stdOut;


$pathToJsScript = dirname(__FILE__). '/browser_ip.js';
$stdOut = exec(sprintf('%s %s %s', $pathToPhatomJs, '--proxy=51.254.106.67:80', $pathToJsScript), $out);
//$stdOut = exec(sprintf('%s %s ', $pathToPhatomJs, $pathToJsScript), $out);

echo $stdOut; 
    
    
?>
