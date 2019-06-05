<?php
//роутер
function route($method, $urlData, $formData) {
	if ( $method === 'POST' ) {
		$result = postUsers($urlData, $formData);
        echo $result;
        return;
		
    } else {
		header('HTTP/1.0 400 Bad Request');
		header('Content-Type: application/json');
		echo json_encode(array(
			'error' => 'Bad Request'
		));
	}
}

//Добавление нового пользователя или авторизация
function postUsers($urlData, $formData){
	if ( isset($formData['login']) && isset($formData['password']) && isset($formData['key']) ){
		$login = trim( htmlspecialchars( $formData['login'] ) );
		$password = md5( trim( htmlspecialchars( $formData['password'] ) ) );
		$key = trim( htmlspecialchars( $formData['key'] ) );

	} else {
		header('HTTP/1.0 400 Bad Request');
		header('Content-Type: application/json');
		echo json_encode(array(
			'error' => 'Bad Request'
		));

		return;
	}


	if ( file_exists( $_SERVER['DOCUMENT_ROOT'] . '/library.php' ) ){
		require_once $_SERVER['DOCUMENT_ROOT'] . '/library.php';
	} else {
		header('HTTP/1.0 404 Not Found');
		header('Content-Type: application/json');
		echo json_encode(array(
			'error' => 'File Not Found'
		));
		return;
	}
	
	
	
	
	connect__open();
	if ( $key === '1' ){
		$result = loginDB($login, $password);
	} else if ( $key === '2' ){
		$result = addToDB($login, $password);
	} else if ( $key === '3' ){
		$result = unloginDB();
	} else {
		$result = 'error';
	}
	connect__close();
	
	
	if ( $result === 'registration successful' ){
		header('HTTP/1.0 200 OK');
		header('Content-Type: application/json');
		return json_encode(array(
			'method' => 'POST',
			'act' => 'registration',
			'result' => 'successful',
		));
	} else if ( $result === 'login successful' ) {
		header('HTTP/1.0 200 OK');
		header('Content-Type: application/json');
			return json_encode(array(
				'method' => 'POST',
				'act' => 'login',
				'result' => 'successful',
			));
	} else if ( $result === 'unlogin successful' ) {
		header('HTTP/1.0 200 OK');
		header('Content-Type: application/json');
			return json_encode(array(
				'method' => 'POST',
				'act' => 'unlogin',
				'result' => 'successful',
			));
	} else {
		header('HTTP/1.0 400 Bad Request');
		header('Content-Type: application/json');
		echo json_encode(array(
			'error' => $result
		));

		return;
	}
}



