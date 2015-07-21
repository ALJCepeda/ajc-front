<?php

$chatURL = "http://chat.aljcepeda.com";
if(ISLOCAL){
	$chatURL = DOMAIN . ':3000';
}

?>
 
<object type="text/html" data="<?=$chatURL?>" width="400" height="450" />