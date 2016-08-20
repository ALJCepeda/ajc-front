<?php
$version = exec("cd ". PARENTDIR . "/snake; git describe --tags --abbrev=0");
?>

<style type="text/css">
	.content-container {
		width: 100%;
		height: 100%;

	  	display: flex;
	  	flex-flow: row wrap;
	  	justify-content:space-around;
	}
</style>

<div class="content-container">
	<div class="header">
		<h1>Snake.IO</h1>
	</div>

	<div class="aside left" style="width:30%;padding-left:30px;">
		<h1>About</h1>
		<p>Welcome to my 'MMO' version of the old school atari game, Snake</p>

		<br />
		<p>It's laggy. The game is being hosted on a shared directory so the performance is poor<br />
		Even so a few people should be able to join and experience the multiplayer without issues</p>

		<br />
		<p>The objective of the game is to eat as much food as you can while trying to take out your opponents<br />
		The more food you eat, the larger you get, the higher your score!</p>
	</div>

	<div class="aside right" style="width:30%;padding-right:30px;">
		<div>
			<h1>To Do</h1>
			<ul>
				<li>Random spawn points</li>
				<li>Implement leaderboards</li>
				<li>Create view ports and zoom for larger grid</li>
				<li>Increase size to compensate for at least 20 clients</li>
				<li>Authenticate with Facebook/Google+/Other</li>
				<li>Custom skins</li>
				<li>World domination</li>
			</ul>
		</div>
	</div>

	<div class="footer">
		<form action= <?= SNAKEURL ?> >
		    <input class="orange button btn btn-default" type="submit" value="Play Now!" disabled="true">
		</form>

		<p>Version: <?= $version ?> </p>
		<p>Written in Node.JS, Express.JS and Socket.IO</p>
	</div>
</div>