<style type="text/css">
	.header {
		flex: 2;
		min-height:80px;
	}
	.intro {
		flex: 2;
		min-height:60px;
	}
	.main {
		flex: 8;
	}
</style>

<div class="q4 row-nw m-center">
	<div class="q3-w tall col-w c-center">
		<div class="header">
			<h1>Good To Know!</h1>
		</div>

		<div class="intro q3-w text-center">
			<p>
				This page contains usefull little tidbits (mainly bash commands) that I've found and can never seem to remember.

				I share them with you! And also because I can't be bothered dealing with Google Drive sometimes.
			</p>
		</div>

		<div class="main row-nw wide">
			<div class="aside left">
				<h3>Description</h3>

				<div class="row">
					1. Changes all file permissions to 644 and all folder permissions to 755 in current directory
				</div>
			</div>

			<div class="aside right">
				<h3>Command</h3>

				<div class="row">
					1. find . -mindepth 1 -type d ! -perm 755 -exec chmod -v 755 {} \; &&  find . -mindepth 1 -type f ! -perm 644 -exec chmod -v 644 {} \;
				</div>
			</div>
		</div>
	</div>
</div>