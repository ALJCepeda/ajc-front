<?php
	$version = '2.0.0';

	if(ISLOCAL === true) {
		$evalURL = 'http://' . $_SERVER['SERVER_NAME'] . ':8002';
	} else {
		$evalURL = 'http://' . 'eval.' . $_SERVER['SERVER_NAME'];
	}

	$ipadURL = 'assets/images/portfolio/ipad';
?>
<!DOCTYPE html>
<html lang='en'>

<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta name='author' content='ALJCepeda'>
	<title>ALJCepeda</title>

	<script type='text/javascript' src='jquery.js'></script>
	<script type='text/javascript' src='underscore.js'></script>
	<script type='text/javascript' src='knockout.js'></script>
	<script type='text/javascript' src='bootstrap.js'></script>
	<script type='text/javascript' src='bootstrap.mdl.js'></script>

	<link rel='stylesheet' type='text/css' href='bootstrap.css'>
	<link rel='stylesheet' type='text/css' href='bootstrap.mdl.css'>

	<link rel='stylesheet' type='text/css' href='/assets/css/flex.css'>
	<link rel='stylesheet' type='text/css' href='/assets/css/index.css'>
	<script type='text/javascript' src='require.js' data-main='index' ></script>
</head>
<body>
<style type="text/css">
.parallaxParent {
	height: 100vh;
	overflow: hidden;
}
.parallaxParent > * {
	height: 200%;
	position: relative;
	top: -100%;
}
.parallaxParent_fixed {
	height:100vh;
	overflow: hidden;
}
.parallaxParent_fixed > * {
	height: 200%;
	position: relative;
	top: -125%;
}
</style>
<div class="spacer s0"></div>
<div class='box2 blue row-w m-center c-center' style='height:100vh;'>
	<div class='flex-container'>
	    <div class='header'>
	        <h1>Welcome</h1>
	    </div>

	    <div class='body text-center'>
	        <p>To the domain of a restless mind</p>
	        <br />
	        <br />
	        <p>This website showcases some projects I've worked on and information on services I provide. Be sure to check back occasionally. I have a big plans and will continue updating whenever I have the time</p>
	        <br />
	        <br />
	    </div>
	</div>

	<div class='flex-container'>
	    <div stye='order:2;'>
	        <h1>General services:</h1>
	        <br />
	        <p>Website Development</p>
	        <p>Mobile Development</p>
	        <p>API Architecture (Web, OOP, Procedural)<p>
	        <p>Database Administration (SQL and No-SQL)</p>
	        <p>System Administration (Mac and Linux)</p>
	        <p>Computer Maintenance</p>
	        <p>Hardware Repair</p>
	        <p>Consultancy and Tutoring</p>
	    </div>
	    <div style='order:3;'>
	        <h1>Platforms:</h1>
	        <br />
	        <p>HTML/CSS/JS</p>
	        <p>Node.JS</p>
	        <p>PHP</p>
	        <p>ASP.Net MVC</p>
	        <p>iOS</p>
	        <p>Android</p>
	        <p>Unity3D</p>
	        <p>MySQL, TSQL, Postgres</p>
	        <p>MongoDB</p>
	        <p>Durandal</p>
	        <p>DevExpress</p>
	    </div>
	</div>
</div>
<div id="parallax1" class="parallaxParent_fixed">
	<div class='row-w m-center c-center' style='background-image:url(assets/images/space/space.gif)'>
		<img src='assets/images/space/sun.gif'></img>
	</div>
</div>

<div class="spacer s1">
<div class="box2 blue row-w m-center c-center" style='height:100vh;'>
	<div class='flex-container'>
		<div class='header'>
			<h1>Eval</h1>
		</div>

		<div class='left'>
			<h1>About</h1>
			<p>Multi-language multi-version code intepreter/compiler</p>

			<br />
			<p>General purpose, single page code editor for testing programming logic on the fly</p>

			<br />

			<div>
				<h1>Technologies: </h1>
				<ul>
					<li><a href='https://nodejs.org/en/'>NodeJS</a> - Webserver</li>
					<li><a href='https://ace.c9.io/#nav=about'>Ace-builds</a> - Code Editor</li>
					<li><a href='http://knockoutjs.com'>Knockoutjs</a> - Two-way Bind/Observable</li>
					<li><a href='https://www.docker.com'>Docker</a> - Virtualization</li>
					<li><a href='https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Flexible_Box_Layout/Using_CSS_flexible_boxes'>Flexbox</a> - Layout</li>
				</ul>
			</div>
		</div>

		<div class='right'>
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

		<div class='footer'>
			<a href='<?= $evalURL ?>'>
		   		<input class='orange button' type='button' value='Code Now!' />
			</a>

			<p>Version: <?= $version ?> </p>
		</div>
	</div>
</div>
</div>
<div class="spacer s0"></div>
<div id="parallax2" class="parallaxParent">
	<div class='row-w m-center c-center' style='background-image:url(assets/images/space/space.gif)'>
	</div>
</div>
<div class="spacer s1">
	<div class='box2 blue'>
		<div class='portfolio-outer'>
			<div class='portfolio-container'>
				<div class='header'>
					<h1>Device Repair</h1>
				</div>

				<div class='body'>
					<p> Along with Software Engineering I'm able to perform minor hardware repairs on computers, game console and some small smart devices. The following pictures are of a recent repair on an iPad Mini. Apple would have charged me $200 to do this repair, but I was able to get it done for $50. </p>

					<img src='<?=$ipadURL?>/broken.jpg' width='75%' height='auto' />

					<p> The iPad's digitizer is removed exposing the underlying LCD screen. You can visibly see the damage to the LCD even with the power turned off. I didn't have all the right tools at the time and had to pry off the digitizer in order to separate it from the adhesive. Since then I've purchased a heat gun to avoid going through the hassle.</p>

					<img src='<?=$ipadURL?>/opened.jpg' width='75%' height='auto' />

					<p> Here is what lies underneath the LCD screen. As you can see the battery takes up most of the room in the device, which is typical for smart devices. Take a look at how big your cellphone battery is to get an idea. In this picture I've also completely removed the digitizer and LCD screen in preparation for their replacements.</p>

					<img src='<?=$ipadURL?>/repaired.jpg' width='75%' height='auto' />

					<p> Finally we have the repaired product, looking clean, slick and plugged in waiting to be tested. The original digitizer is still intact, functional and can be used to as a spare part in the future. </p>

					<img src='<?=$ipadURL?>/finished.jpg' width='75%' height='auto' />

					<p> Hurray! Working and ready for the best game available on the iOS marketplace, Faster Than Light: FTL. Get it now and fulfill your childhood dreams of being a two dimensional space captain, you'll thank me later :D</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="spacer s0"></div>
<div id="parallax3" class="parallaxParent_fixed">
	<div class='row-w m-center c-center' style='background-image:url(assets/images/space/space.gif)'>
		<img src='assets/images/space/moon.gif'></img>
	</div>
</div>
<div class="spacer s1">
	<div class="box2 blue row-w m-center c-center" style='height:100vh;'>
		<div class='flex-container'>
		    <div class='header'>
		        <h1>About Me</h1>
		    </div>

		    <div class='body text-center'>
				<p>I graduated from the University of Central Florida with a Bachelor's of Science in Computer Science. I left high school with a 4.2 GPA and college with a 3.2 GPA</p>
				<br />
				<p>I first became interested in programming when I was 12. After turning my PC into a dedicated Counter-Strike server I installed AMXModX which allowed me to create several popular plugins and amaze my friends</p>
				<br />
				<br />
				<p>Since then I've been enthralled with the world learning anything and everything I can. I'm not just a Software Engineer, I'm a philosopher, a physicist, a mathematician and a teacher. I love anything that makes me think and I share my knowledge with anyone that'll listen.</p>
				<br />
				<br />
				<p>I honestly love this world and I have a great deal of pride in the work I do. I'm searching for a place that shares my passion, welcomes unique perspectives and strives for a better tomorrow</p>
		    </div>
		</div>
	</div>
</div>
<div class="spacer s0"></div>
<div id="parallax4" class="parallaxParent_fixed">
	<div class='row-w m-center c-center' style='background-image:url(assets/images/space/space.gif)'>
		<img src='assets/images/space/earth.gif'></img>
	</div>
</div>
</body>
</html>
