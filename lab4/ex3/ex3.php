<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результат подсчёта</title>
</head>
<body>
    <h1>Результат</h1>
    <?php
    if (isset($_POST['text'])) {
        $text = trim($_POST['text']);
        if (!empty($text)) {
            // Разбиваем текст на слова (учитываем пробелы и переносы строк)
            $allWords = preg_split('/\s+/u', $text, -1, PREG_SPLIT_NO_EMPTY);
            $russianWords = 0;
            $englishWords = 0;

            foreach ($allWords as $word) {
                // Проверяем, содержит ли слово русские буквы (кириллицу)
                if (preg_match('/\p{Cyrillic}/u', $word)) {
                    $russianWords++;
                } 
                // Проверяем, содержит ли слово английские буквы (латиницу)
                elseif (preg_match('/[a-zA-Z]/', $word)) {
                    $englishWords++;
                }
            }

            echo "<p>Всего слов: <strong>" . count($allWords) . "</strong></p>";
            echo "<p>Русских слов: <strong>$russianWords</strong></p>";
            echo "<p>Английских слов: <strong>$englishWords</strong></p>";
        } else {
            echo "<p>Текст не введён!</p>";
        }
    } else {
        echo "<p>Ошибка: форма не отправлена.</p>";
    }
    ?>
    <a href="index.html">Назад</a>
</body>
</html>