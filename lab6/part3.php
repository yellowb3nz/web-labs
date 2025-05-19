<?php
$url = 'https://jsonplaceholder.typicode.com/posts';
$ch = curl_init();

// установка verifyper, returntransfer, настройка curl
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPGET, true);

$response = curl_exec($ch);
if(curl_errno($ch)) {
    echo 'Ошибка cURL: ' . curl_error($ch);
    curl_close($ch);
    exit;
}

$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// закрытие curl-сессии
curl_close($ch);

// обработка ответа
if ($http_code == 200) {
    $data = json_decode($response);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo 'Ошибка при декодировании JSON: ' . json_last_error_msg();
        exit;
    }

    // data output
    print_r($data);
} else {
    // обработка ошибок
    echo 'Ошибка HTTP: ' . $http_code . "\n";
    if ($http_code >= 400 && $http_code < 500) {
        echo 'Клиентская ошибка (4xx).';
    } elseif ($http_code >= 500 && $http_code < 600) {
        echo 'Ошибка сервера (5xx).';
    }
}