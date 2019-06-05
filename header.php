<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="none"/>
	<title>test 5</title>
	<link href="/reset.css" rel="stylesheet">
	<link href="/bootstrap-grid.min.css" rel="stylesheet">
	<link href="/style.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="/script.js"></script><!---->


	
</head>
<body>
<header>
	<div class="container">
		<div class="row align-items-center justify-content-between">
			<div class="col-12 col-lg-3">
				<div class="header__logo">
					<a href="#" class="header__logoLink">logo</a>
				</div>
			</div>
			<div class="col-12 col-lg-7">
				<nav class="header__nav">
					<ul class="header__ol">
						<li class="header__li"><a href="/" class="header__a">main</a></li>
						<li class="header__li"><a href="/login" class="header__a">login</a></li>
						<li class="header__li"><a href="/registration" class="header__a">registration</a></li>
						<li class="header__li"><a href="/table" class="header__a">table</a></li>
					</ul>
				</nav>
			</div>
<?php
if ( isset($_COOKIE['authorization']) && $_COOKIE['authorization'] === 'successful' ){
?>
			<div class="col-12 col-lg-2">
				<div class="logout__wrap">
					<button class="logout" onclick="unlogin()">logout</button>
				</div>
			</div>
<?php
} else {
?>
			<div class="col-12 col-lg-2">
				<div class="logout__wrap hidden">
					<button class="logout" onclick="unlogin()">logout</button>
				</div>
			</div>
<?php
}
?>
		</div>
	</div>
</header>


<main>
