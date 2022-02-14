<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: registration.html");
}
require_once 'DbConnection.php';
$post = $_POST;
try {
    if (checkUser($post['login'])) {
        echo '<p>Пользователь с таким именем уже существует!</p>';
        echo '<a href="registration.html">Вернуться на страницу регистрации</a>';
    } elseif (preg_match('/[a-zа-яё]/', $post['phone']) && filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        echo 'Проверьте корректность заполнения полей';
    } else
    {
        if (addUser($post['login'], $post['email'], $post['phone'], $post['password']))
            echo 'Вы успешно зарегистрированы!';
        else echo 'Ошибка при регистрации. Попробуйте ещё раз';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    echo 'Ошибка при регистрации. Попробуйте ещё раз';
}

function checkUser($login){
    $connection = DbConnection::getInstance()->getConnection();
    $sql = "SELECT * FROM auth_test WHERE login = :login;";
    $params = [
        'login' => $login
    ];
    $statement = $connection->prepare($sql);
    $statement->execute($params);
    return $statement->fetch(PDO::FETCH_BOUND);
}

function addUser($login, $email, $phone, $pwd){
    $connection = DbConnection::getInstance()->getConnection();
    $sql = "INSERT INTO auth_test(login, email, phone, password) VALUE (:login, :email, :phone, :pwd);";
    $params = [
        'login' => $login,
        'email' => $email,
        'phone' => $phone,
        'pwd' => $pwd
    ];
    $statement = $connection->prepare($sql);
    return $statement->execute($params);
}

