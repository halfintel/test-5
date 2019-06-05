<?php
if ( file_exists( $_SERVER['DOCUMENT_ROOT'] . '/login.php' ) && file_exists( $_SERVER['DOCUMENT_ROOT'] . '/registration.php' ) && file_exists( $_SERVER['DOCUMENT_ROOT'] . '/table.php' ) && file_exists( $_SERVER['DOCUMENT_ROOT'] . '/main.php' ) ){
} else {
	header('HTTP/1.0 404 Not Found');
	header('Content-Type: application/json');
	echo json_encode(array(
		'error' => 'File Not Found'
	));
	die;
}


//разбор url
$url = (isset($_GET['path'])) ? $_GET['path'] : '';
$url = rtrim($url, '/');
$path = explode('/', $url);
$urlData = array_slice($path, 1);



//подключение нужной страницы
if( $path[0] === 'login' ) {
	//авторизация
	require_once 'login.php';
} else if( $path[0] === 'registration' ) {
	//регистрация
	require_once 'registration.php';
} else if( $path[0] === 'table' ) {
	//таблица
	require_once 'table.php';
} else {
	//главная
	require_once 'main.php';
}



/*
добавить кнопку "выход" - готово
доделать script.js - готово
сделать вывод таблицы пользователей - готово
повесить скрипт на кнопку выхода - готово
сделать обработку ошибок в js - готово
сделать обработку ошибок в php - готово


доделать library.php (подключение к БД)

разобраться, почему криво подключаются файлы - готово

*/

