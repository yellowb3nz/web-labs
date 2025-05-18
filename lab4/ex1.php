<?php
$str = 'tggtfr frtfgt tfrgrgrtgt tfrrt tsst ttdd tf t';
$reg = "/t..t/"; // 't' + два любых символа + 't'

$matches = array();

$count = preg_match_all($reg, $str, $matches);

echo "Найдено строк: $count \n";
var_dump($matches);