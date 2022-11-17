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
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://www.myersdaily.org/joseph/javascript/md5.js"></script>
        <style>
            #login {
                padding-top: 50px;
                height: 100vh;
                align-items: center
            }
            #login .form-wrap {
                width: 30%;
                margin: 0 auto;
            }
            #login h1 {
                color: #1fa67b;
                font-size: 18px;
                text-align: center;
                font-weight: bold;
                padding-bottom: 20px;
            }
            #login .form-group {
                margin-bottom: 25px;
            }
            #login .checkbox {
                margin-bottom: 20px;
                position: relative;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                -o-user-select: none;
                user-select: none;
            }
            #login .checkbox.show:before {
                content: '\e013';
                color: #1fa67b;
                font-size: 17px;
                margin: 1px 0 0 3px;
                position: absolute;
                pointer-events: none;
                font-family: 'Glyphicons Halflings';
            }
            #login .checkbox .character-checkbox {
                width: 25px;
                height: 25px;
                cursor: pointer;
                border-radius: 3px;
                border: 1px solid #ccc;
                vertical-align: middle;
                display: inline-block;
            }
            #login .checkbox .label {
                color: #6d6d6d;
                font-size: 13px;
                font-weight: normal;
            }
            #login .btn.btn-outline-success {
                font-size: 14px;
                margin-bottom: 20px;
                border-color: #1fa67b;
                color: #1fa67b;
            }
            #login .btn.btn-outline-success:hover {
                border-color: #1fa67b;
                background-color: #1fa67b;
                color: #fff;
            }
            #login .btn.btn-success {
                font-size: 14px;
                margin-bottom: 20px;
                border-color: #1fa67b;
                color: #fff;
            }
            #login .btn.btn-success:hover {
                border-color: #157347;
                color: #fff;
            }

            #login .forget {
                font-size: 13px;
                text-align: center;
                display: block;
            }

            /*    --------------------------------------------------
                :: Inputs & Buttons
                -------------------------------------------------- */
            .form-control {
                color: #212121;
            }

            .btn-success{
                background-color: #1fa67b;
                border-color: #1fa67b;
            }

            /*    --------------------------------------------------
                :: Footer
                -------------------------------------------------- */
            #footer {
                color: #6d6d6d;
                font-size: 12px;
                text-align: center;
            }
            #footer p {
                margin-bottom: 0;
            }
            #footer a {
                color: inherit;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <title>Login</title>
    </head>
    <body>
    <div class="container" style="height: 100vh;align-items: center">
        <div id="login" class=" row align-items-center" >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-10 col-lg-8 col-xl-8" >
                        <div class="form-wrap w-100 p-md-5 p-sm-1" style="background: rgba(109,109,109,0.09);width: 500px;border-radius: 20px";>
                            <img src="img/logo.png" style="width: 100%;height: auto">
                            <label id="errorLabel">dsadasd</label>
                            <form role="form" action="javascript:;" method="post" id="login-form" autocomplete="off" >
                                <div class="form-group">
                                    <label for="emailInput" class="sr-only">Email</label>
                                    <input type="email" name="email" id="emailInput" class="form-control" placeholder="Inserire mail">
                                </div>
                                <div class="form-group">
                                    <label for="passwordInput" class="sr-only">Password</label>
                                    <input type="password" name="key" id="passwordInput" class="form-control" placeholder="Inserire password">
                                </div>
                            </form>
                            <div class="d-flex justify-content-center">
                                <button type="button" id="signIn" class="btn btn-success m-lg-1">Log in</button>
                                <button type="button" id="signUp" class="btn btn-outline-success m-lg-1" data-bs-toggle="modal" data-bs-target="#registrationModal">Registrati</button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="javascript:retrievePassword();" class="forget " data-bs-toggle="modal" data-bs-target="#retrievePassword" data-bs-whatever="forgotPassword">Forgot your password?</a>
                            </div>
                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div>
    </div>

    <!-- Modal recupero password -->
    <div class="modal fade" id="retrievePassword" tabindex="-1" aria-labelledby="retrievePasswordLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="retrievePasswordLabel">Recupera password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Inserisci il tuo account</p>
                    <input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-success">Recupera</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal registrazione -->
    <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="registrationLabel">Registrazione</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form role="form" action="javascript:;" method="post" id="registration-form" autocomplete="off">
                        <div class="form-group">
                            <label class="sr-only">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Inserire il nome">
                        </div>
                        <div class="form-group">
                            <label class="sr-only">Cognome</label>
                            <input type="text" name="surname" id="surname" class="form-control" placeholder="Inserire il cognome">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="emailRegistration" class="form-control" placeholder="Inserire la mail">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="key" id="keyRegistration" class="form-control" placeholder="Inserire la password">
                        </div>
                        <div class="form-group">
                            <label class="sr-only">Codice azienda</label>
                            <input type="number" name="code" id="companyCode" class="form-control" placeholder="Inserire il codice dell'azienda">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-success">Registrati</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const retrievePasswordModal = document.getElementById('retrievePassword');
        const regisrtatioModal = document.getElementById('registration');
        function retrievePassword(){
            //send mail
        }
        $('#signIn').on('click',function () {
            console.log("ciao");
            let email = $('#emailInput');
            let password = $('#passwordInput');
            let errorMessage = $('#errorLabel');

            if (email.val() === '') {
                errorMessage.html('Email non inserita');
            } else if (password.val() === '') {
                errorMessage.html('Password non inserita');
            } else {
                let pwMd5 = md5(md5(password.val()));
                console.log(pwMd5);
                $.post('php/login/login.php', {email: email.val(), pw: pwMd5}, function (resp) {
                    if (resp === 'userWrong') {
                        errorMessage.html('Credenziali errate');
                        $('#passwordInput, #emailInput').addClass('is-invalid');
                        password.attr('for', 'floatingInputInvalid');
                        email.attr('for', 'floatingInputInvalid');
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