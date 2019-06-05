<?php

//подключение к MySQL
function connect__open(){
	global $db;
	
	$db_server = "localhost"; // локалхост
	$db_user = "root"; // имя пользователя
	$db_password = ""; // пароль если существует
	$db_name = "bright_test5"; // база данных
	

	try {
		$db = new PDO("mysql:host=$db_server; dbname=$db_name", $db_user, $db_password);
	} catch (PDOException $e){
		header('HTTP/1.0 500 Internal Server Error');
		header('Content-Type: application/json');
		echo json_encode(array(
			'error' => 'Internal Server Error'
		));
		exit();
	}
}
//отключение от MySQL
function connect__close(){
	global $db;
	$db=null;
}
//добавление пользователя в БД
function addToDB($login, $password){
	global $db;
	$sql = "INSERT INTO users (login, password)
		VALUES('$login', '$password')";
	$db->exec($sql);
	
	$haystack = $db->errorInfo();
	if ($haystack[2] === null){
		setcookie('authorization','successful',time() + (100), '/');
		setcookie('user',$login,time() + (100), '/');
		return 'registration successful';
	} else {
		return 'Nickname is busy';
	}
}
//авторизация пользователя
function loginDB($login, $password){
	global $db;

	$sql = "SELECT login, password FROM users WHERE login = '$login'";
	$data = $db->query($sql);

	if ( gettype($data) == boolean ){
		return 'User not found';
	} else {
		foreach($data as $value) {
			if ( $password === $value['password'] ){
				$content = 1;
			} else {
				$content = 0;
			}
		}
	}
	
	$haystack = $db->errorInfo();
	if ($haystack[2] === null){
		if ( $content === 1 ){
			setcookie('authorization','successful',time() + (100), '/');
			setcookie('user',$login,time() + (100), '/');
			return 'login successful';
		} else {
			return 'Password incorrect';
		}
	} else {
		return 'SQL error';
	}
}
//выход из аккаунта
function unloginDB(){
	setcookie ( 'authorization', '', time()-5, '/');
	setcookie ( 'user', '', time()-5, '/');
	return 'unlogin successful';
}



//получение списка пользователей
function selectFromDB(){
	global $db;
	
	$sql = "SELECT id, login FROM users ORDER BY id ASC";
	$data = $db->query($sql);

	$content = [];
	$ind = 0;
	foreach($data as $value) {
		$content[$ind] = [];
		$content[$ind][0] = $value['id'];
		$content[$ind][1] = $value['login'];
		$ind++;
	}

	$haystack = $db->errorInfo();
	if ($haystack[2] === null){
		return $content;
	} else {
		return 'SQL error';
	}
}
