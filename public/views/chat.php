<?php

$chatURL = "http://chat.aljcepeda.com";
if(ISLOCAL){
	$chatURL = SERVERNAME . ':8002';
}

?>

<style type="text/css">
	.content-container {
		text-align: center;
	}
</style>

<title>Chat.IO</title>

<h1>Live Chat</h1>

<object type="text/html" data="<?=$chatURL?>" width="400" height="450">
</object>

<p>
A simple lightweight application written with NodeJS and Socket.io. This client will eventually be adopted into a taskbar application similar to facebook's messenger.
</p>