<?php
	$tidbits = [
		new \Model\Other\TidBit("find . -type d ! -perm 755 -exec chmod -v 755 {} \; && </br> find . -type f ! -perm 644 -exec chmod -v 644 {} \;",
								"Changes permissions of all files to 644 and all folders to 755 in (and including) the current directory"),
		new \Model\Other\TidBit("sudo lsof -i :80",
								"Returns the pids of processes bound to port 80"),
		new \Model\Other\TidBit("docker build -t {repository}/{package}:{version} {dir}",
								"Builds a Dockerfile with a name such as aljcepeda/php:7.0"),
		new \Model\Other\TidBit("scp /path/to/file username@a:/path/to/destination",
								"Copies a file over SSH, destination can be switched"),
		new \Model\Other\TidBit("find . -type f -name \"._*\" -delete",
								"Recusively deletes the wildcard for the current directory"),
		new \Model\Other\TidBit("\$data = ['a', 'b', 'c', 17, 'e'];</br>
								 header('Content-Type: text/csv');</br>
								 header('Content-Disposition: attachment; filename=\"foo.csv\"'); </br>
								 fputcsv(fopen(\"php://output\", \"w+\"), \$data);",
								 "Easy way to output data in CSV format minus the fluff"),
		new \Model\Other\TidBit("hdiutil makehybrid -iso -joliet -o MyRip.iso MyRip.cdr",
								"Converts ISO -> CDR format on Mac OS X"),
		new \Model\Other\TidBit("pbcopy < ~/.ssh/id_rsa.pub",
								"Copy public key on Mac OS X"),
		new \Model\Other\TidBit("git submodule update --init --recursive",
								"Recursively initializes all submodules in a git project"),
		new \Model\Other\TidBit("git submodule foreach --recursive 'command'",
								"Recursively apply command to the directories of each submodule. Command doesn't have to be git like 'echo \$path'")
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
	<div class="q3-w tall col-nw c-center">
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