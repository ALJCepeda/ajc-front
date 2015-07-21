<?php

$chatURL = "http://chat.aljcepeda.com";
if(ISLOCAL){
	$chatURL = DOMAIN . ':3000';
}

?>

<h1>Live Chat</h1>

<object type="text/html" data="<?=$chatURL?>" width="400" height="450">
</object>

<p>
A simple lightweight application written with NodeJS and Socket.io. It implements CSS3 flexbox which will make it fully reactive to small UIs. This client will eventually be adopted into a taskbar application similar to facebook's messenger.
</p>