<style type="text/css">
	#pad {
		display: block;
		width: 97%;
		color:black;
		background: white;
		margin: 0 auto;
		text-align: left;
	}

</style>

<div id="pad">
	<textarea id="codepad"></textarea>
</div>

<script type="text/javascript">
	var codemirror = CodeMirror.fromTextArea(document.getElementById('codepad'), {
		lineNumbers: true,
		mode:'javascript'
	});
	codemirror.setSize(500, 500);
	//var codemirror = CodeMirror(document.body)
</script>