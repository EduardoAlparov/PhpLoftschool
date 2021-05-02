<?php

function getUser()
{

}

function addUser()
{

}

function addOrder()
{

}

function sandMessage()
{

}

function main($data)
{
    $user = getUser();
    if(empty($user)) {
        addUser();
        $user = getUser();

    }
    $order = addOrder();
    sandMessage();
}

main($_POST);