<?php

$snakeURL = "http://snake.aljcepeda.com";
if(ISLOCAL){
	$snakeURL = DOMAIN . ':3000';
}

?>

<style type="text/css">
	.content-container {
		height: 100%;
	}
	.outer-container {
		overflow-y: hidden;
	}
</style>

<h1>Snake.IO</h1>

<iframe type="text/html" id="game" src="<?=$snakeURL?>" width="100%" height="500" frameBorder="0"> </iframe>

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