<?php
$snakeURL = "http://snake.aljcepeda.com";
if(ISLOCAL){
	$snakeURL = SERVERNAME . ':8001';
}
?>

<title>Snake.IO</title>

<div class="header">
	<h1>Snake.IO</h1>
</div>

<div class="aside left">
	<h1>About</h1>
	<p>Welcome to my 'MMO' version of the old school atari game, Snake</p>

	<br />
	<p>It's laggy. The game is being hosted on a shared directory so the performance is poor</p>
	<br />
	<p>Even so a few people should be able to join and experience the multiplayer without issues</p>

	<br />
	<p>Currently you spawn with 200 units. This is just for testing purposes and will change as the game is updated</p>
</div>

<div class="aside right">
	<h1>To Do</h1>
	<ul>
		<li>Random spawn points</li>
		<li>Add food(s)</li>
		<li>Spawn food randomly and in quantity</li>
		<li>Track and display score</li>
		<li>Add UI</li>
		<li>Implement different resolutions for grid</li>
		<li>Create view ports and zoom for larger grid</li>
		<li>Increase size to compensate for at least 20 clients</li>
		<li>Authenticate with Facebook/Google+/Other</li>
		<li>Implement leaderboards</li>
		<li>Custom skins</li>
		<li>World domination</li>
	</ul>
</div>

<div class="footer">
	<form action= <?=$snakeURL?> >
	    <input type="submit" value="Play Now!">
	</form>

	<p>Version 0.1.0 </p>
	<p>Written in Node.JS, Express.JS and Socket.IO</p>
</div>