<?php
session_start();
if (!isset($_SESSION['login'])){
    header('Location: authorization.html');
}
$login = $_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
</head>
<body>
<h1><?= $login ?>, это Ваш личный кабинет</h1>
</body>
</html>
