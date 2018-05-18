<?php
$myfile = fopen("testlog.txt", "a") or die("Unable to open file!");
$txt = "Write at ".date("Y:m:d")." Time: ".date("h:i:sa")."\n";
print $txt;
fwrite($myfile, $txt);
fclose($myfile);
?>
