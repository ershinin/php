"use strict";

document.forms.authorization.addEventListener('submit', function auth(event) {
    event.preventDefault();
    fetch('authorization.php', {
        method: 'post',
        body: new FormData(this)
    })
        .then(response => response.text())
        .then(text => {
            if (text === 'SUCCESS') {
                window.location.replace('personal.php');
            } else if (text === 'WRONG') {
                document.getElementById('message').innerText = 'Вход не выполнен. Проверьте имя пользователя/пароль'
            } else {
                document.getElementById('message').innerText = 'Произошла ошибка. Попробуйте ещё раз. ' + text;
            }
        })
})