<?php
$evalURL = ISLOCAL ? "http://eval.aljcepeda.local" : "http://eval.aljcepeda.com";
$flexURL = "https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Flexible_Box_Layout/Using_CSS_flexible_boxes";
?>

<title>Eval</title>

<div class="header">
	<h1>Eval</h1>
</div>

<div class="aside left" style="width:30%;padding-left:30px;">
	<h1>About</h1>
	<p>Multi-language multi-version code intepreter/compiler</p>

	<br />
	<p>General purpose, single page code editor for testing programming logic on the fly</p>

	<br />
	
	<div>
		<h1>Technologies: </h1>
		<ul>
			<li><a href="https://nodejs.org/en/">NodeJS</a> - Webserver</li>
			<li><a href="https://ace.c9.io/#nav=about">Ace-builds</a> - Code Editor</li>
			<li><a href="http://knockoutjs.com">Knockoutjs</a> - Two-way Bind/Observable</li>
			<li><a href="https://www.docker.com">Docker</a> - Virtualization</li>
			<li><a href="<?= $flexURL ?>">Flexbox</a> - Layout</li>
		</ul>
	</div>
</div>

<div class="aside right" style="width:30%;padding-right:30px;">
	<div>
		<h1>To Do:</h1>
		<ul>
			<li>Output programming errors</li>
			<li>Panel for HTML output</li>
			<li>Panel for STDOUT output</li>
			<li>Persistent scripts</li>
			<li>Multi-document support</li>
			<li>SQL support</li>
			<li>Webserver support</li>
			<li>Cross-platform support</li>
		</ul>
	</div>
</div>

<div class="footer">
	<a href="<?=$evalURL?>">
   		<input class="orange button" type="button" value="Code Now!" />
	</a>

	<p>Version 0.1.0 </p>
</div>