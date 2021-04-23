<?php
// задание 1:

$name = "Эдуард";
$age = 31;

echo "Меня зовут $name <br/> Мне $age год <br/> “!|/’”\ <br/>";

// задание 2:

define('TOTAL_PIC', (int)80);  //всего рисунков
define('BY_FELTPEN', (int)23); // рисунков, выполненных фломастером
define('BY_PENCIL', (int)40); // рисунков, выполненных карандашом

echo 'Красками выполнено  ' . (TOTAL_PIC - BY_FELTPEN - BY_PENCIL) . ' ' . 'рисунков.';
echo '<br/>';

// задание 3

//$age = rand();
$age = mt_rand(0, 100);

echo "$age <br/>";

if($age >= 18 && $age <= 65) {
    echo 'Вам еще работать и работать';
} elseif($age > 65 && $age < 100) {
    echo 'Вам пора на пенсию';
} elseif($age > 1 && $age < 18) {
    echo 'Вам ещё рано работать';
} else {
    echo 'Неизвестный возраст';
}

// задание 4

$day = mt_rand(0, 8);

echo "<br/>$day<br/>";

switch ($day) {
    case ($day >= 1) && ($day <= 5):
        echo 'Это рабочий день';
        break;
    case ($day >= 6) && ($day <= 7):
        echo 'Это выходной день';
        break;
    case ($day > 7) && ($day < 1):
        echo 'Неизвестный день';
        break;
}

echo '<br/>';

// задание 5

$bmw = array(
    "model" => "X5",
    "speed" => 120,
    "doors" => 5,
    "year" => "2015"
);

$toyota = array(
    "model" => "mark2",
    "speed" => 240,
    "doors" => 5,
    "year" => "2000"
);

$opel = array(
    "model" => "astra",
    "speed" => 180,
    "doors" => 3,
    "year" => "2010"
);

$multi_array = array($bmw,$toyota,$opel);

echo '<pre/>';
var_dump($multi_array);

echo '<br/>';
echo '<br/>';
echo '<br/>';
echo '<br/>';


$n = empty(strpos('Иванов','Иван')) ? 1 : 2;
echo $n;