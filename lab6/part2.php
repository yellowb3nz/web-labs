<?php

// 1. get-запрос с кастомными заголовками
$ch = curl_init();

// url
$url = 'https://jsonplaceholder.typicode.com/posts';

// кастомные заголовки
$headers = [
    'Custom-header: SomeTextForCustomHeader '
];

// установка url, заголовков, veryfypeer, returntransfer
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Ошибка запроса: ' . curl_error($ch);
}

// закрытие curl-сессии
curl_close($ch);

echo "GET Response:\n$response\n";

// 2. post-запрос
$ch = curl_init();

// url
$url = 'https://jsonplaceholder.typicode.com/posts';

// data
$data = [
    'title' => 'Text',
    'body' => 'TTExxtt',
    'userId' => 1
];

// data -> json
$jsonData = json_encode($data);

// кастомные заголовки
$headers = [
    'Content-Type: application/json'
];

// установка url, post-method, тело запроса, veryfypeer, заголовков, returntransfer
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Ошибка запроса: ' . curl_error($ch);
}

// закрытие curl-сессии
curl_close($ch);

echo "POST response: " . $response . "\n";

// 3. get-запрос
$ch = curl_init();

// url
$url = 'https://jsonplaceholder.typicode.com/posts';

// параметры для url
$params = [
    'userId' => 1
];

// строка параметров
$str = http_build_query($params);
$urlWithParams = $url . '?' . $str;

// установка url с параметрами, returntransfer, verifypeer
curl_setopt($ch, CURLOPT_URL, $urlWithParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Ошибка запроса: ' . curl_error($ch);
}

// закрытие curl-сессии
curl_close($ch);