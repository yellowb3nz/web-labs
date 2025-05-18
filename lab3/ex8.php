<?php
// 1. Функция, которая добавляет восклицательный знак к строке
function increaseEnthusiasm($str) {
    return $str . '!';
}

// 2. Вызов функции increaseEnthusiasm()
echo increaseEnthusiasm("Привет мир") . "\n";

// 3. Функция, которая повторяет строку три раза
function repeatThreeTimes($str) {
    return $str . $str . $str;
}

// 4. Вызов функции repeatThreeTimes()
echo repeatThreeTimes("PHP ") . "\n";

// 5. Комбинированный вызов функций
echo increaseEnthusiasm(repeatThreeTimes("Функции ")) . "\n";

// 6. Функция cut с необязательным параметром
function cut($str, $length = 10) {
    return substr($str, 0, $length);
}

// Примеры вызова функции cut
echo cut("Длинная строка для обрезки") . "\n";      // Обрежет до 10 символов
echo cut("Длинная строка для обрезки", 5) . "\n";   // Обрежет до 5 символов

// 7. Рекурсивный вывод элементов массива
function printArrayRecursively($arr, $index = 0) {
    if ($index < count($arr)) {
        echo $arr[$index] . " ";
        printArrayRecursively($arr, $index + 1);
    }
}

$numbers = [1, 2, 3, 4, 5];
echo "Рекурсивный вывод массива: ";
printArrayRecursively($numbers);
echo "\n";

// 8. Рекурсивное сложение цифр числа до однозначного результата
function sumDigitsUntilSingle($number) {
    $sum = array_sum(str_split((string)$number));
    if ($sum > 9) {
        return sumDigitsUntilSingle($sum);
    }
    return $sum;
}

$num = 9875;
echo "Сумма цифр числа $num до однозначного: " . sumDigitsUntilSingle($num) . "\n";
?>