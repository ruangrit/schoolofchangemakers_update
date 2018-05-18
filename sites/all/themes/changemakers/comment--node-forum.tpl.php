<?php  
global $user;

$comment = $content['comments'];
unset($content['comments']);
print render($content);    

?>