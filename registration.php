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

	<section id="registration">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="sect1__h2">registration</h1>
				</div>
				<div class="col-12">
<?php
if ( isset($_COOKIE['authorization']) && $_COOKIE['authorization'] === 'successful' ){
?>
					<div class="form__wrap hidden">
						<form class="form">
							<input class="form__input" id="nickname" type="text" placeholder="Nickname" minlength="4" maxlength="16" title="from 4 to 16 latin letters and numbers" pattern="[A-Za-z0-9]{4,16}" required></input>
							<input class="form__input" id="password" type="password" placeholder="Password" minlength="8" maxlength="16" title="from 8 to 16 latin letters and numbers" pattern="[A-Za-z0-9]{8,16}" required></input>
							<button class="form__button" type="button">registration</button>
						</form>
					</div>
					<div class="logout__wrap">
						<div class="logout__text">you are already logged in!</div>
						<button class="logout" onclick="unlogin()">logout</button>
					</div>
<?php
} else {
?>
					<div class="form__wrap">
						<form class="form">
							<input class="form__input" id="nickname" type="text" placeholder="Nickname" minlength="4" maxlength="16" title="from 4 to 16 latin letters and numbers" pattern="[A-Za-z0-9]{4,16}" required></input>
							<input class="form__input" id="password" type="password" placeholder="Password" minlength="8" maxlength="16" title="from 8 to 16 latin letters and numbers" pattern="[A-Za-z0-9]{8,16}" required></input>
							<button class="form__button" type="button">registration</button>
						</form>
					</div>
					<div class="logout__wrap hidden">
						<div class="logout__text">you are already logged in!</div>
						<button class="logout" onclick="unlogin()">logout</button>
					</div>
<?php
}
?>
					<div class="ajax"></div>
				</div>
			</div>
		</div>
	</section>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/footer.php';
