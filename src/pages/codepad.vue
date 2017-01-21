<template>
  <div class='page'>
    <div class='page-content'>
    	<div class='well col-xs-10'>
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
    						<li>Multi-version support</li>
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
  </div>
</template>

<script>
  export default {
    name: 'codepad'
  };
</script>

<style lang='less'>

</style>
