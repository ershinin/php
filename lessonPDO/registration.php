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
    } else {
        if (addUser($post['login'], $post['password']))
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

function addUser($login, $pwd){
    $connection = DbConnection::getInstance()->getConnection();
    $sql = "INSERT INTO auth_test(login, password) VALUE (:login, :pwd);";
    $params = [
        'login' => $login,
        'pwd' => $pwd
    ];
    $statement = $connection->prepare($sql);
    return $statement->execute($params);
}

