<?php
$str = "a1b2c3"; //Заменить числа на их утроенный квадрат
$reg = "/[0-9]/";

function func($matches){
    return pow($matches[0]*3, 2);
}

$result = preg_replace_callback($reg, "func", $str);

echo $result;