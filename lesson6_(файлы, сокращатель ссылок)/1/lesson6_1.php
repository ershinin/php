<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: lesson6_1.html');
}

function check_type($name) {
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    return ($ext === 'txt');
}

function check_size($size) {
    return ($size <= 10000);
}

function check_errors($error) {
    return ($error === 0);
}

function move($text_files, $key) {
    $tmp_name = $text_files['tmp_name'][$key];
    $file_name = microtime() . $text_files['name'][$key];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $file_name = md5(microtime() . $file_name) . ".$ext";
    move_uploaded_file($tmp_name, "$file_name");
}

$files = $_FILES;
$result = [];
foreach ($files['text_files']['name'] as $key => $name) {
    $result[$key] = 'Файл '.$name;

    if (!check_type($name)) {
        $result[$key] = $result[$key].' не был загружен (неправильное расширение)';
        continue;
    }
    if (!check_size($files['text_files']['size'][$key])) {
        $result[$key] = $result[$key].' не был загружен (слишком большой размер)';
        continue;
    }
    if (!check_errors($files['text_files']['error'][$key])) {
        $result[$key] = $result[$key].' не был загружен (ошибка при передаче на сервер)';
        continue;
    }

    $result[$key] = $result[$key].' успешно загружен';
    move($files['text_files'], $key);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Результат загрузки файлов</title>
</head>
<body>

<ol>
    <?php foreach ($result as $file): ?>
    <li><?= $file ?></li>
    <?php endforeach; ?>
</ol>

</body>
</html>