<?php
/* Imagine a lot of code here */
$very_bad_unclear_name = "15 chicken wings";

// Write your code:
$order = &$very_bad_unclear_name;  // Создаем ссылку на $very_bad_unclear_name
$order .= " with curry sauce";     // Добавляем строку через конкатенацию

// Don't change the line below
echo "\nYour order is: $very_bad_unclear_name.";