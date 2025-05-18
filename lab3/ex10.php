<?php
/*
 * Решение задач с конструкцией if-else в PHP
 */

// 1. Функция проверки суммы двух чисел
function checkSum($a, $b) {
    return ($a + $b) > 10;
}
echo "1. Сумма 5 и 6 > 10? " . (checkSum(5, 6) ? 'true' : 'false') . "\n";

// 2. Функция проверки равенства чисел
function checkEqual($a, $b) {
    return $a == $b;
}
echo "2. Числа 5 и 5 равны? " . (checkEqual(5, 5) ? 'true' : 'false') . "\n";

// 3. Сокращенная форма if
$test = 0;
echo "3. Сокращенная форма: " . ($test == 0 ? 'верно' : '') . "\n";

// 4. Проверка возраста и суммы цифр
$age = 45;
if ($age < 10 || $age > 99) {
    echo "4. Число $age вне диапазона 10-99\n";
} else {
    $sum = array_sum(str_split($age));
    if ($sum <= 9) {
        echo "4. Сумма цифр числа $age однозначна ($sum)\n";
    } else {
        echo "4. Сумма цифр числа $age двузначна ($sum)\n";
    }
}

// 5. Проверка массива и сумма элементов
$arr = [1, 2, 3];
if (count($arr) == 3) {
    $sum = array_sum($arr);
    echo "5. В массиве 3 элемента, их сумма: $sum\n";
}

// Альтернативный вариант для задачи 4 с функцией
function checkAge($age) {
    if ($age < 10 || $age > 99) {
        return "Число $age вне диапазона 10-99";
    }
    
    $sum = array_sum(str_split($age));
    return $sum <= 9 
        ? "Сумма цифр числа $age однозначна ($sum)"
        : "Сумма цифр числа $age двузначна ($sum)";
}
echo "\nДополнительно (функция для задачи 4):\n" . checkAge(45) . "\n";
?>