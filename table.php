<?php
if ( file_exists( $_SERVER['DOCUMENT_ROOT'] . '/library.php' ) && file_exists( $_SERVER['DOCUMENT_ROOT'] . '/header.php' ) && file_exists( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ) ){
} else {
	header('HTTP/1.0 404 Not Found');
	header('Content-Type: application/json');
	echo json_encode(array(
		'error' => 'File Not Found'
	));
	die;
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/library.php';
connect__open();
$tableArray = selectFromDB();
connect__close();

require_once $_SERVER['DOCUMENT_ROOT'] . '/header.php';
?>

	<section id="table">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h1 class="sect1__h2">table</h1>
				</div>
				<div class="col-12">
<?php
if ( $tableArray !== 'SQL error' && $tableArray !== [] ){
?>
					<table>
						<thead>
							<tr>
								<th class="table__th">id</th>
								<th class="table__th">login</th>
							</tr>
						</thead>
						<tbody>
<?php
	foreach ( $tableArray as $tableItem ){
?>
							<tr>
								<td class="table__td"><?php echo $tableItem[0] ?></td>
								<td class="table__td"><?php echo $tableItem[1] ?></td>
							</tr>
<?php	
	}
?>
						</tbody>
					</table>
<?php
} else if ( $tableArray === [] ){
?>
					<h2>Users Not Found</h2>
<?php	
} else {
?>
					<h2>SQL error</h2>
<?php	
}
?>
				</div>
			</div>
		</div>
	</section>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/footer.php';