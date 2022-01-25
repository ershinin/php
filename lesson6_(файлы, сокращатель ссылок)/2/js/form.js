"use strict";

let message = document.getElementById('invalid');
let answer = document.querySelector('.answer');
let shortLink =  document.getElementById('shortLink');

document.forms.reducer.addEventListener('submit', function (event) {
    event.preventDefault();
    fetch('reducer.php', {
        method: 'post',
        body: new FormData(this),
    })
        .then(response => response.text())
        .then(text => {
            if (text === 'INVALID') {
                message.innerText = 'Введенная ссылка некорректна';
                message.style.visibility = 'visible';
                answer.style.visibility = 'hidden';
                shortLink.value = '';
            } else {
                message.innerText = '';
                message.style.visibility = 'hidden';
                shortLink.value = text;
                answer.style.visibility = 'visible';
                this.reset();
            }
        })
})