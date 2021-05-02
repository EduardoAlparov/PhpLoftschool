<?php
/**
 *Задание #3.1

Программно создайте массив из 50 пользователей, у каждого пользователя есть поля id, name и age:
id - уникальный идентификатор, равен номеру эл-та в массиве
name - случайное имя из 5-ти возможных (сами придумайте каких)
age - случайное число от 18 до 45
Преобразуйте массив в json и сохраните в файл users.json
Откройте файл users.json и преобразуйте данные из него обратно ассоциативный массив РНР.
Посчитайте количество пользователей с каждым именем в массиве
Посчитайте средний возраст пользователей
 **/


/**Создание массива **/
//$users = [];
//$names = ['Ваня', 'Вадим', 'Игорь', 'Андрей', 'Сергей'];
//for($i = 0; $i <= 50; $i++) {
//    $user = [
//        'id' => $i,
//        'name' => $names[mt_rand(0, 4)],
//        'age' => mt_rand(18, 45)
//    ];
//    $users[] = $user;
//}

/** Преобразование масссива в json и сохранение в файл **/
//$usersJson = json_encode($users);
//file_put_contents('../users.json', $usersJson);

/** Открытие файла и преобразование его в массив PHP **/
$usersJsonDecode = json_decode(file_get_contents('../users.json'), true);

/** Количество пользователей с каждым именем в массиве **/
$arrayJustNames = array_column($usersJsonDecode, 'name');
foreach (array_count_values($arrayJustNames) as $key => $val) {
    echo '<br>';
    echo "Пользователей с именем $key  - $val человек.";
}

/** Средний возраст пользователей **/
$arrayJustAge = array_column($usersJsonDecode, 'age');
$count = 0;
foreach ($arrayJustAge as $key => $val) {
    $count += $val;
}
echo '<br>';
echo $count;
