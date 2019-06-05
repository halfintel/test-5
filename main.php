<?php
if ( file_exists( $_SERVER['DOCUMENT_ROOT'] . '/header.php' ) && file_exists( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ) ){
} else {
	header('HTTP/1.0 404 Not Found');
	header('Content-Type: application/json');
	echo json_encode(array(
		'error' => 'File Not Found'
	));
	die;
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>

	<section id="sect1">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="sect1__h2">title</h1>
				</div>
				<div class="col-12">
					<p class="sect1__p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
		</div>
	</section>
	<section id="sect2">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="sect2__h2">Pictures</h2>
				</div>
				<div class="col-12">
					<div class="sect2__pictures">
						<img class="sect2__picture" src="/sect2__picture.png">
						<img class="sect2__picture" src="/sect2__picture.png">
						<img class="sect2__picture" src="/sect2__picture.png">
						<img class="sect2__picture" src="/sect2__picture.png">
						<img class="sect2__picture" src="/sect2__picture.png">
						<img class="sect2__picture" src="/sect2__picture.png">
						<img class="sect2__picture" src="/sect2__picture.png">
						<img class="sect2__picture" src="/sect2__picture.png">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="sect3">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="sect3__h2">Video</h2>
				</div>
				<div class="col-12">
					<div class="sect3__video">
						<iframe class="sect3__videoFrame" width="560" height="315" src="https://www.youtube.com/embed/LkPBCbx9HzY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
