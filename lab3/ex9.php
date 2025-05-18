<?php
// 1. Заполнение массива 'x', 'xx', 'xxx' и т.д.
$arrayX = [];
for ($i = 1; $i <= 5; $i++) {
    $arrayX[] = str_repeat('x', $i);
}
echo "1. Массив с 'x':\n";
print_r($arrayX);

// 2. Функция arrayFill
function arrayFill($value, $count) {
    return array_fill(0, $count, $value);
}
echo "\n2. arrayFill('x', 5):\n";
print_r(arrayFill('x', 5));

// 3. Сумма элементов двухмерного массива
$matrix = [[1, 2, 3], [4, 5], [6]];
$sum = 0;
foreach ($matrix as $row) {
    $sum += array_sum($row);
}
echo "\n3. Сумма элементов массива: $sum\n";

// 4. Создание двумерного массива [[1,2,3], [4,5,6], [7,8,9]]
$matrix = [];
$counter = 1;
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        $matrix[$i][$j] = $counter++;
    }
}
echo "\n4. Двумерный массив:\n";
print_r($matrix);

// 5. Операции с элементами массива
$numbers = [2, 5, 3, 9];
$result = $numbers[0] * $numbers[1] + $numbers[2] * $numbers[3];
echo "\n5. Результат вычислений: $result\n";

// 6. Ассоциативный массив пользователя
$user = [
    'name' => 'Строков',
    'surname' => 'Данил',
    'patronymic' => 'Викторович'
];
echo "\n6. ФИО: {$user['surname']} {$user['name']} {$user['patronymic']}\n";

// 7. Массив с текущей датой
$date = [
    'year' => date('Y'),
    'month' => date('m'),
    'day' => date('d')
];
echo "\n7. Текущая дата: {$date['year']}-{$date['month']}-{$date['day']}\n";

// 8. Количество элементов в массиве
$arr = ['a', 'b', 'c', 'd', 'e'];
echo "\n8. Количество элементов: " . count($arr) . "\n";

// 9. Последний и предпоследний элементы
echo "\n9. Последний элемент: " . end($arr) . "\n";
echo "Предпоследний элемент: " . $arr[count($arr) - 2] . "\n";
?>