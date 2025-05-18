<?php
session_start(); // Начинаем сессию

// Проверяем, отправлена ли форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Записываем данные в сессию
    $_SESSION['shop_name'] = $_POST['shop_name'];
    $_SESSION['category'] = $_POST['category'];
    $_SESSION['work_time'] = $_POST['work_time'];

    // Перенаправляем на страницу с выводом данных
    header('Location: index.php');
    exit();
} else {
    echo "Ошибка: форма не отправлена!";
}
?>