"use strict";

document.getElementById('cabinet').addEventListener('click', function () {
    document.getElementById('modal-background').style.display = 'block';
});

document.forms.auth.addEventListener('submit', function (event) {
    event.preventDefault();
    if (this.elements.login.value !== ''  && this.elements.password.value !== '') {

        document.getElementById('invalid').style.visibility = 'hidden';
        fetch('auth.php', {
            method: 'post',
            body: new FormData(this)
        })
            .then(response => response.text())
            .then(text => {
                if (text === 'SUCCESS') {
                    document.getElementById('modal-background').style.display = 'none';
                    document.getElementById('wrong').style.visibility = 'hidden';
                }
                else document.getElementById('wrong').style.visibility = 'visible';
            });
    } else {
        document.getElementById('invalid').style.visibility = 'visible';
    }

})