<style type="text/css">
	.outer-container {
        display: flex;
        flex-direction:column;
        align-items: center;
        justify-content: flex-start;
    }

	.content-container {
		height: 100%;
		width:50%;
		text-align: center;
	}
</style>

<div class="content_container">
	<div class="header">
		<h1>Portfolio</h1>
	</div>

	<?php render_template("portfolio_entry", [ "name" => "Alfred" ]); ?>
	<?php render_template("portfolio_entry", [ "name" => "Shawn" ]); ?>
</div>