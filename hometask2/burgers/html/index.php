<?php

include "../php/src/class.db.php";

$q = "INSERT INTO users (id, `email` , order_count)
                                    VALUES (2, :email, 1);";
$db = Db::getInstance();
$ret = $db->exec($q, ['email'=>'work@yandex.ru'], __FILE__);
echo '<pre>';
var_dump($ret);
var_dump($db->lastInsertId());
var_dump($db->getLog());


//$q = "SELECT * FROM users WHERE id =1";
//$db = Db::getInstance();
//$ret = $db->fetchAll($q, [],  __FILE__);
//echo '<pre>';
//var_dump($ret);
//var_dump($db->lastInsertId());
//var_dump($db->getLog());