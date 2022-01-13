<?php
$post = $_POST;
$login = $post['login'];
$password = $post['password'];
if ($login === 'qwe' && $password === '123') {
    echo 'SUCCESS';
} else {
    echo 'FAIL';
}