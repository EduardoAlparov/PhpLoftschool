<?php
include '../burgers/php/src/config.php';
include '../burgers/php/src/class.db.php';

/** получение пользователя из БД **/
function getUser(string $email)
{
    $db = Db::getInstance();
    $query = "SELECT * FROM users WHERE email = :email";
    return $db->fetchOne($query, [':email' => $email], __METHOD__);
}

/** Добавление пользователя в БД **/
function addUser(string $email, string $name)
{
    $db = Db::getInstance();
    $query = "INSERT INTO users(email, `name`) VALUES (:email, :name)";
    $result = $db->exec($query, [
            ':email' => $email,
            ':name' => $name
        ],
        __METHOD__
    );

    if (!$result) {
        return false;
    }

    return $db->lastInsertId();
}

/** Добавление заказа в БД **/
function addOrder(int $userId, array $data)
{
    $db = Db::getInstance();
    $query = "INSERT INTO orders(user_id, address, created_at) VALUES (:user_id, :address, :created_at)";
    $result = $db->exec(
        $query,
        [
            ':user_id' => $userId,
            ':address' => $data['address'],
            ':created_at' => date('Y-m-d H:i:s'),

        ],
        __METHOD__,
    );
    if (!$result) {
        return false;
    }
    return $db->lastInsertId();
}

/** Добавление заказа к прошлым заказам **/
function appendOrder(int $userId)
{
    $db = Db::getInstance();
    $query = "UPDATE users SET order_count = order_count +1 WHERE id = $userId";
    return $db->exec($query,[], __METHOD__);
}

/** Вывод сообщения **/
function sandMessage($address, $orderId, $orderNumber)
{
    echo "Спасибо, ваш заказ будет доставлен по адресу: $address<br>
    Номер вашего заказа: #$orderId <br>
    Это ваш $orderNumber-й заказ!";
}

function main($method)
{
    $email = $_POST['email'];
    $name = $_POST['name'];

    $addressFields = ['street', 'home', 'part', 'appt', 'floor'];
    $address = '';

    foreach ($_POST as $field => $value) {
        if ($value && in_array($field, $addressFields)) {
            $address .= $value . ',';
        }
    }

    $data = ['address' => $address];
    $user = getUser($email);

    if(empty($user)) {
        addUser($email ,$name);
        $user = getUser($email);
    }

    if ($user) {
        $userId = $user['id'];
        appendOrder($user['id']);
        $orderNumber = $user['order_count'] + 1;
    } else {
        $orderNumber = 1;
        $userId = addUser($email, $name);
    }

    $orderId = addOrder($userId, $data);
    sandMessage($address, $orderId, $orderNumber);
}

main($_POST);

