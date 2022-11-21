<?php
session_start();
require_once('php/connessione.php');
if (isset($_SESSION['session_id'])) {
    header('location: pages/lista-anagrafica.php');
} else {
    ?>
    <!DOCTYPE html>
    <html lang="it">
    <head>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
        <script src="./js/login.js"></script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/c0c3eed4d9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./css/login.css">
        <title>Alfatecnica - Accedi</title>
    </head>

    <body>
    <div class="body">
        <div class="veen">
            <div class="login-btn splits">
                <button class="active">Accedi</button>
            </div>
            <div class="rgstr-btn splits">
                <button>Contatti</button>
            </div>

            <div class="wrapper">
                <img style="width: auto; height:150px; margin-bottom: 30px; margin-top: 30px;" src="./img/logo.png" alt="logo">
                <form id="login" tabindex="500">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="emailInput" placeholder="Email" autocomplete="email">
                        <label for="emailInput" id="label-email">Indirizzo Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="passwordInput" placeholder="Password" autocomplete="current-password">
                        <label for="passwordInput" id="label-pw">Password</label>
                    </div>
                    <br>
                    <br>
                    <br>
                    <button class="dark" type="button" id="signIn">Accedi</button>
                    <p id="msgErr" style="margin-top: 20px; color: red;"></p>
                </form>
                <form id="register" tabindex="502">
                    <div class="name">
                        <input type="text" name=""/>
                        <label>Nome e cognome</label>
                    </div>
                    <div class="mail">
                        <input type="email" name=""/>
                        <label>Mail</label>
                    </div>
                    <div class="uid">
                        <input type="text" name=""/>
                        <label>Messaggio</label>
                    </div>
                    <br>
                    <button class="dark" style="opacity: 0.25" disabled>Invia</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#show').click(function () {
            let pass = $('#passwordInput');
            if (pass.type === 'password')
                pass.type = 'text';
            else
                pass.type = 'password';
        });

        $('#signIn').click(function () {
            let email = $('#emailInput');
            let password = $('#passwordInput');
            let errorMessage = $('#msgErr');
            let emailLabel = $('#label-email');
            let passwordLabel = $('#label-pw');

            if (email.val() === '') {
                errorMessage.text('Email non inserita');
                email.addClass('is-invalid');
                emailLabel.attr('for', 'floatingInputInvalid');
                emailLabel.html('Invalid Email');
            } else if (password.val() === '') {
                errorMessage.text('Password non inserita');
                password.addClass('is-invalid');
                passwordLabel.attr('for', 'floatingInputInvalid');
                passwordLabel.html('Invalid Password');
            } else {
                $.post('php/login/login.php', {email: email.val(), pw: password.val()}, function (resp) {
                    if (resp === 'userWrong') {
                        errorMessage.html('Credenziali errate');
                        $('#passwordInput, #emailInput').addClass('is-invalid');
                        passwordLabel.attr('for', 'floatingInputInvalid');
                        passwordLabel.html('Invalid Password');
                        emailLabel.attr('for', 'floatingInputInvalid');
                        emailLabel.html('Invalid Email');
                    } else {
                        window.location.href = "pages/lista-anagrafica.php";
                    }
                });
            }
        });
    </script>
    </body>

    </html>
    <?php
}
?>
