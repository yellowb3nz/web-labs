<?php
require_once 'ApiClient.php';
$api = new ApiClient('https://jsonplaceholder.typicode.com', 'demo', 'demo');

echo "GET: Получение списка заголовков постов\n";
$getResult = $api->GET('/posts');

if ($getResult['http_code'] === 200) {
    foreach (array_slice($getResult['response'],0) as $post) {
        echo "- {$post['title']}\n";
    }
} else {
    echo "Ошибка при GET-запросе: {$getResult['http_code']}\n";
}

echo "\nPOST: Создание нового поста\n";
$newPost = [
    'title' => 'fsdfasf',
    'body' => 'POST. fdsafsadas',
    'userId' => 1
];

$postResult = $api->POST('/posts', $newPost);
if ($postResult['http_code'] === 201) {
    echo "Пост успешно создан с ID: " . $postResult['response']['id'] . "\n";
} else {
    echo "Ошибка при POST-запросе: {$postResult['http_code']}\n";
}

echo "\nDELETE: Удаление поста (id = 1)\n";
$deleteResult = $api->DELETE('/posts/1');
if (in_array($deleteResult['http_code'], [200, 204])) {
    echo "Пост успешно удалён (id = 1).\n";
} else {
    echo "Ошибка при DELETE-запросе: {$deleteResult['http_code']}\n";
}