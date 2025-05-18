<?php
// 1. Среднее арифметическое элементов массива
$numbers = [1, 2, 3, 4, 5];
$average = array_sum($numbers) / count($numbers);
echo "1. Среднее арифметическое: " . $average . "\n\n";

// 2. Сумма чисел от 1 до 100
$sum = array_sum(range(1, 100));
echo "2. Сумма чисел от 1 до 100: " . $sum . "\n\n";

// 3. Массив с квадратными корнями
$numbers = [1, 4, 9, 16, 25];
$sqrtArray = array_map('sqrt', $numbers);
echo "3. Массив с квадратными корнями:\n";
print_r($sqrtArray);
echo "\n";

// 4. Массив с буквами алфавита в качестве ключей
$letters = range('a', 'z');
$numbers = range(1, 26);
$alphabetArray = array_combine($letters, $numbers);
echo "4. Массив букв алфавита:\n";
print_r($alphabetArray);
echo "\n";

// 5. Сумма пар чисел из строки
$str = '1234567890';
$pairs = str_split($str, 2);
$sumPairs = array_sum($pairs);
echo "5. Сумма пар чисел: " . $sumPairs . "\n";
?>