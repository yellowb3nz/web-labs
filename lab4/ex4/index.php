<?php
session_start(); // Начинаем сессию

// Проверяем, есть ли данные в сессии
if (isset($_SESSION['shop_name'])) {
    echo "<h1>Информация о магазине</h1>";
    echo "<p><strong>Название:</strong> " . $_SESSION['shop_name'] . "</p>";
    echo "<p><strong>Категория товаров:</strong> " . $_SESSION['category'] . "</p>";
    echo "<p><strong>Время работы:</strong> " . $_SESSION['work_time'] . "</p>";
    echo '<a href="index.html">Изменить данные</a>';
} else {
    echo "<p>Данные о магазине не найдены.</p>";
    echo '<a href="index.html">Ввести данные</a>';
}
?>