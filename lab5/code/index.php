<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Desk</title>
</head>
<body>
    <div>
    <form action="save.php" method="post">
        <label for="Email">Email</label>
        <input type="email" name="email" required><br>
        <label for="category">Категория</label>
        <select name="category" required>
            <option><?php
                $directory = 'categories';
                if (is_dir($directory)) {
                    $files = scandir($directory);
                    foreach ($files as $file) {
                        if ($file !== '.' && $file !== '..') {
                            $category = pathinfo($file, PATHINFO_FILENAME);
                            echo "<option value=\"$category\">$category</option>";
                        }
                    }
                }?></option>
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
            <thead>
            <th>Category</th>
            <th>Title</th>
            <th>Description</th>
            </thead>
            <tbody>
            <?php
            $directory = 'categories';

            if (is_dir($directory)) {
                $categories = scandir($directory);

                foreach ($categories as $category) {
                    // Пропускаем . и ..
                    if ($category !== '.' || $category !== '..') {
                        $categoryPath = $directory . '/' . $category;
                    }
                    if (is_dir($categoryPath)) {
                        $files = scandir($categoryPath);

                        foreach ($files as $file) {
                            if (pathinfo($file, PATHINFO_EXTENSION) === 'txt') {
                                $filePath = "$categoryPath/$file";
                                $title = pathinfo($file, PATHINFO_FILENAME);
                                $description = htmlspecialchars(file_get_contents($filePath));

                                echo "<tr>";
                                echo "<td>$category</td>";
                                echo "<td>$title</td>";
                                echo "<td><pre>$description</pre></td>";
                                echo "</tr>";
                            }
                        }
                    }
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>