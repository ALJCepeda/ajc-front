<?php

$snakeURL = "http://snake.aljcepeda.com";
if(ISLOCAL){
	$snakeURL = DOMAIN . ':3000';
}

?>

<title>Snake.IO</title>
<style type="text/css">
	.content-container {
		height:100%;
		width:100%;

		display: flex;
		flex-flow:column space-around;
	}
	.left {
		max-width: 25%;
		flex: 1 auto;
		order:1;
	}
	.game {
		text-align: center;
		max-width:75%;
		flex: 2 auto;
		order: 2;
	}
	.right {
		max-width: 25%;
		flex: 1 auto;
		order:3;
	}
</style>
<div class="left">
	<h1>About</h1>
	<p>Welcome to my 'MMO' version of the old school atari game, Snake</p>

	<br />
	<p>It's laggy. The game is being hosted on a shared directory so the performance is poor</p>
	<br />
	<p>Even so a few people should be able to join and experience the multiplayer without issues</p>

	<br />
	<p>Currently you spawn with 200 units. This is just for testing purposes and will change as the game is updated</p>

	<br />
	<p>If the game isn't displaying correctly, it can also be played by going to <a href="http://snake.aljcepeda.com">snake.aljcepeda.com</a></p>
</div>

<div class="game">
	<h1>Snake.IO</h1>
	<iframe type="text/html" id="game" src="<?=$snakeURL?>" frameBorder="0"> </iframe>
</div>

<div class="right">
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

<script type="text/javascript">
$(document).ready(function() {
	$.ajax({
		url:"<?=$snakeURL?>/info"
	}).done(function(data) {
		$("#game")[0].setAttribute("width", data['htmlWidth'] + 20);
		$("#game")[0].setAttribute("height", data['htmlWidth'] + 20);
	}).fail(function() {
		$("#game")[0].setAttribute("width", 520);
		$("#game")[0].setAttribute("height", 520);
	});
});
</script>   