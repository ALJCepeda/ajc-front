<?php
	class TidBit {
		public $description = "";
		public $command = "";

		function __construct($command, $description) {
			$this->description = $description;
			$this->command = $command;
		}
	}

	$tidbits = [
		new TidBit( "find . -type d ! -perm 755 -exec chmod -v 755 {} \; && </br> find . -type f ! -perm 644 -exec chmod -v 644 {} \;",
					"Changes permissions of all files to 644 and all folders to 755 in (and including) the current directory"),
		new TidBit( "sudo lsof -i :80",
					"Returns the pids of processes bound to port 80")
	];
?>

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
	.gutter {
		min-width:20px;
	}
	.row ~ .row {
		margin-top:20px;
	}

	.row:nth-child(even) {
		color:silver;
	}
	.row:nth-child(odd) {
		color:lightblue;
	}
</style>

<div class="q4 row-nw m-center">
	<div class="q3-w tall col-w c-center">
		<div class="header">
			<h1>Good To Know!</h1>
		</div>

		<div class="intro q3-w text-center">
			<p>
				This page contains useful little tidbits (mainly bash commands) that I've found and can never seem to remember.

				I share them with you! And also because I can't be bothered logging into Google Drive.
			</p>
		</div>

		<div class="main wide">
			<div class="row-nw">
				<div class="aside">
					<h3>Commands</h3>
				</div>

				<div class="aside">
					<h3>Descriptions</h3>
				</div>
			</div>

			<?php foreach ($tidbits as $index => $tid) {	?>
				<div class="row row-nw">
					<div class="gutter">
						<?= $index+1 ."." ?>
					</div>

					<div class="aside">
						<?= $tid->command ?>
					</div>

					<div class="aside">
						<?= $tid->description ?>
					</div>
				</div>
			<?php }	?>
		</div>
	</div>
</div>