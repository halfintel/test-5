<?php

// Разбираем url
$url = $_SERVER['SCRIPT_NAME'];
$url = rtrim($url, '/');
$urlData = explode('/', $url);
$urlData = array_slice($urlData, 1);

$method = $_SERVER['REQUEST_METHOD'];	//GET/POST/PUT/PATCH/DELETE
$formData = getFormData($method);

//подключение роутера
if ( file_exists( $_SERVER['DOCUMENT_ROOT'] . '/api/routers/users.php' ) ){
	require_once $_SERVER['DOCUMENT_ROOT'] . '/api/routers/users.php';
	route($method, $urlData, $formData);
} else {
	header('HTTP/1.0 404 Not Found');
	header('Content-Type: application/json');
    echo json_encode(array(
        'error' => 'File Not Found'
    ));
}



// Получение данных из тела запроса
function getFormData($method) {
    if ($method === 'GET') return $_GET;
    if ($method === 'POST') return $_POST;
 
    // PUT, PATCH или DELETE
    $data = array();
    $exploded = explode('&', file_get_contents('php://input'));
 
    foreach($exploded as $pair) {
        $item = explode('=', $pair);
        if (count($item) == 2) {
            $data[urldecode($item[0])] = urldecode($item[1]);
        }
    }
 
    return $data;
}