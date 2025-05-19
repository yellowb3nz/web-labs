<?php
// 1. get-запрос
function getPosts() {
    $url = 'https://jsonplaceholder.typicode.com/posts';
    $response = file_get_contents($url);
    return json_decode($response, true);
}

// 2. post-запрос
function createPost($title, $body, $userId = 1) {
    $url = 'https://jsonplaceholder.typicode.com/posts';
    $data = [
        'title' => $title,
        'body' => $body,
        'userId' => $userId
    ];

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($data)
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    return json_decode($response, true);
}

// 3. put-запрос
function updatePost($postId, $title, $body, $userId = 1) {
    $url = "https://jsonplaceholder.typicode.com/posts/$postId";
    $data = [
        'id' => $postId,
        'title' => $title,
        'body' => $body,
        'userId' => $userId
    ];

    $options = [
        'http' => [
            'method' => 'PUT',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($data)
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    return json_decode($response, true);
}

// 4. delete-запрос
function deletePost($postId) {
    $url = "https://jsonplaceholder.typicode.com/posts/$postId";
    $options = [
        'http' => [
            'method' => 'DELETE'
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    return $response === '{}';
}

echo "<h2>1. GET-запрос (получение постов)</h2>";
$posts = getPosts();
echo "<pre>" . print_r(array_slice($posts, 0, 3), true) . "</pre>";

echo "<h2>2. POST-запрос (создание поста)</h2>";
$newPost = createPost('Новый пост', 'Текст нового поста');
echo "<pre>" . print_r($newPost, true) . "</pre>";

echo "<h2>3. PUT-запрос (обновление поста)</h2>";
$updatedPost = updatePost(1, 'Обновлённый заголовок', 'Новый текст');
echo "<pre>" . print_r($updatedPost, true) . "</pre>";

echo "<h2>4. DELETE-запрос (удаление поста)</h2>";
$isDeleted = deletePost(1);
echo $isDeleted ? "Пост удалён успешно!" : "Ошибка удаления";
?>