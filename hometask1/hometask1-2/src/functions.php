<?php
/**
Задание #1
Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе (тег <p>).
Если в функцию передан второй параметр true, то возвращать (через return) результат в виде одной объединенной строки.
 **/

function task1($array = [], bool $return = false)
{
    if (!$return) {
        $result = implode("\n", array_map(function (string $str) {
            return "<p>$str</p>";
        }, $array));
        echo $result;
    } elseif($return === true) {
        return implode(' ', $array);
    }

}

/**
Задание #2

Функция должна принимать переменное число аргументов.
Первым аргументом обязательно должна быть строка, обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
Остальные аргументы это целые и/или вещественные числа.
**/

function task2($str = '', ...$args)
{

    $operators = ['+', '-', '/', '*'];

    foreach ($args as $item) {
        if(!is_numeric($item)) {
            echo 'Error in args';
        }
    }

    if(!in_array($str, $operators)){
        echo 'Error in operator';
    }

    switch ($str) {
        case '+':
            return array_sum($args);
            break;
        case '-':
            $sum_last_args = 0;
            for($i=1; $i < count($args); $i++) {
                $sum_last_args -= $args[$i];
            };
            $diff = reset($args) + $sum_last_args;
            echo 'Разность равна ' . $diff;
            break;
        case '/':
            $res = array_shift($args);
            foreach ($args as $item){
                if($item !== $args[0] && $item == 0) {
                    echo "Делитель не может быть равен 0";
                    break 2;
                }
                $res = $res / $item;
            }
            echo $res;
        case '*':
            $res = 1;
            for($a = 0; $a < count($args); $a++) {
                $res *= $args[$a];
            }
            echo $res;

    }
}

/**
Задание #3 (Использование рекурсии не обязательно)

Функция должна принимать два параметра – целые числа.
Если в функцию передали 2 целых числа, то функция должна отобразить таблицу умножения размером со значения параметров,
 * переданных в функцию. (Например если передано 8 и 8, то нарисовать от 1х1 до 8х8). Таблица должна быть выполнена с
 * использованием тега <table>
В остальных случаях выдавать корректную ошибку.
 **/

function task3($a, $b)
{
    if(!is_int($a) || !is_int($b) ) {
        trigger_error('Переменная должна быть целым числом');
    }

    if($a <= 0 || $b <= 0 ) {
        trigger_error('Переменная должна быть больше либо равна единице');
    }

    echo '<table>';
    for ($i = 1; $i <= $a; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $b; $j++) {
            echo '<td>';
            echo $result = $i * $j;
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}


/**
Задание #6 (выполняется после просмотра модуля “ВСТРОЕННЫЕ ВОЗМОЖНОСТИ ЯЗЫКА”)

Напишите функцию, которая будет принимать имя файла, открывать файл и выводить содержимое на экран.
 **/

function task6(string $fileToRead)
{
    if (!file_exists($fileToRead)) {
        echo trigger_error('Такого файла не существует');
    } else {
        $f = fopen($fileToRead, 'r');
        $str = fgets($f, 1024);
        echo $str;
        fclose($f);
    }
}

