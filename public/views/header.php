<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/assets/images/icons/favicon.ico">

	<title>Main Page</title>

	<!-- Bootstrap core CSS -->
	<link href= <?= CONTENT_PROVIDER . "/bootstrap/dist/css/bootstrap.min.css" ?> rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href= <?= CONTENT_PROVIDER . "/bootstrap/dist/css/cover.css" ?> rel="stylesheet">

	<script src= <?= CONTENT_PROVIDER . "/jquery/dist/jquery.min.js" ?> ></script>
	<script src= <?= CONTENT_PROVIDER . "/bootstrap/dist/js/bootstrap.min.js" ?> ></script>

	<script>
	    $(document).ready(function() {
	        $('a[href="' + this.location.pathname + '"]').parent().addClass('active');
	    });
	</script>
</head>

<body>
    <div class="site-wrapper">
      	<div class="site-wrapper-inner">
        	<div class="cover-container">
          		<div class="masthead clearfix">
            		<div class="inner">
	              		<h3 class="masthead-brand">ALJCepeda</h3>
		              	<nav>
		                	<ul class="nav masthead-nav">
		                  		<li><a href="/">Home</a></li>
		                  		<li><a href="/user/create">Register</a></li>
		                  		<li><a href="http://blog.aljcepeda.com">Blog</a></li>
		                	</ul>
		              	</nav>
            		</div>
         		</div>