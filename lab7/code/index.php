<?php
$mysqli = new mysqli('db', 'root', 'helloworld', 'web');

if (mysqli_connect_errno()) {
    printf("Ошибка подключения. Код ошибки: %s\n", mysqli_connect_error());
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $mysqli->real_escape_string($_POST['email']);
    $title = $mysqli->real_escape_string($_POST['title']);
    $category = $mysqli->real_escape_string($_POST['category']);
    $description = $mysqli->real_escape_string($_POST['description']);

    $query = "INSERT INTO ad (email, title, description, category) VALUES ('$email', '$title', '$description', '$category')";
    $mysqli->query($query);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$advertisements = [];
if ($result = $mysqli->query('SELECT * FROM ad ORDER BY created DESC')) {
    while ($row = $result->fetch_assoc()) {
        $advertisements[] = $row;
    }
    $result->close();
}
$mysqli->close();
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bulletin Board</title>
</head>
<body>
    <div>
    <form method="post">
        <label for="Email">Email</label>
        <input type="email" name="email" required><br>
        <label for="category">Категория</label>
        <select name="category" required>
            <option>Охота</option>
            <option>Рыбалка</option>
            <option>Туризм</option>
        </select><br><br>
        <label for="title">Заголовок</label>
        <input type="text" name="title" required><br><br>

        <label for="description">Описание</label>
        <textarea rows="10" name="description"></textarea>

        <label>
            <input type="submit" value="save">
        </label>
    </form>
</div>
    <div id="table">
        <table>
            <tbody>
            <?php foreach ($advertisements as $ad): ?>
                <div class="ad">
                    <h3>Заголовок: <?= htmlspecialchars($ad['title']) ?></h3>
                    <p><?= nl2br(htmlspecialchars($ad['description'])) ?></p>
                    <small>
                        Категория: <?= htmlspecialchars($ad['category']) ?><br>
                        Email: <?= htmlspecialchars($ad['email']) ?>
                    </small>
                </div>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>