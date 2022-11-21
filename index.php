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
                        <div class="form-wrap w-100 p-md-5 p-sm-1" style="background: rgba(109,109,109,0.09);width: 500px;border-radius: 20px">
                            <img src="img/logo.png" style="width: 100%;height: auto" alt="logo">
                            <label id="errorLabel" style="width: 100%;color: red; text-align: center"></label>
                            <form role="form" action="javascript:0;" method="post" id="login-form" autocomplete="off" >
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
                    <form>
                        <label id="emailRetrievePassword" for="recovery-email" class="sr-only">Inserisci il tuo account</label>
                        <input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Annulla</button>
                    <button id="recoveryButton" type="button" class="btn btn-success">Recupera</button>
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
                    <form role="form" action="javascript:0;" method="post" id="registration-form" autocomplete="off">
                        <div class="form-group">
                            <label id="nameLabel" for="name" class="sr-only">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Inserire il nome">
                        </div>
                        <div class="form-group">
                            <label id="surnameLabel" for="surname" class="sr-only">Cognome</label>
                            <input type="text" name="surname" id="surname" class="form-control" placeholder="Inserire il cognome">
                        </div>
                        <div class="form-group">
                            <label id="emailLabel" for="emailRegistration" class="sr-only">Email</label>
                            <input type="email" name="email" id="emailRegistration" class="form-control" placeholder="Inserire la mail">
                        </div>
                        <div class="form-group">
                            <label id="keyRegistrationLabel" for="keyRegistration" class="sr-only">Password</label>
                            <input type="password" name="key" id="keyRegistration" class="form-control" placeholder="Inserire la password">
                        </div>
                        <div class="form-group">
                            <label id="companyCodeLabel" for="companyCode" class="sr-only">Codice azienda</label>
                            <input type="number" name="code" id="companyCode" class="form-control" placeholder="Inserire il codice dell'azienda">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button id="registrationButton" type="button" class="btn btn-success">Registrati</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal dopo registrazione -->
    <div class="modal fade" id="justRegistered" tabindex="-1" aria-labelledby="registeredLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: darkgreen" id="registeredLabel">Sei già registrato</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="afterRegistrationLabel">
                    Le credenziali che hai inserito sono già presenti nel nostro database, esegui il login per poter accedere ai nostri servizi.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal errore registrazione -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: darkred" id="errorModalLabel">È stato riscontrato un problema</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label id="errorRegistrationLabel">La tua registrazione non è andata come ci aspetavamo. Qualcosa è andato storto, contattaci per risolvere il problema.</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const validateEmail = (email) => {
            return email.match(
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        };
        $('#signIn').on('click',function () {
            let email = $('#emailInput');
            let password = $('#passwordInput');
            let errorMessage = $('#errorLabel');

            if (email.val() === '') {
                errorMessage.html('Email non inserita');
            } else if (password.val() === '') {
                errorMessage.html('Password non inserita');
            } else {
                $.post('php/login/login.php', {email: email.val(), pw: password.val()}, function (resp) {
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

        $('#registrationModal').on('shown.bs.modal', function (e) {
            $('#registrationButton').on('click',function () {
                let name = $('#name');
                let surname = $('#surname');
                let email = $('#emailRegistration');
                let password = $('#keyRegistration');
                let companyCode = $('#companyCode');
                let allFilled = true;

                if (name.val() === '') {
                    name.addClass('is-invalid');
                    name.attr('for', 'floatingInputInvalid');
                    allFilled = false;
                } else {
                    name.removeClass('is-invalid');
                }
                if (surname.val() === '') {
                    surname.addClass('is-invalid');
                    surname.attr('for', 'floatingInputInvalid');
                    allFilled = false;
                } else {
                    surname.removeClass('is-invalid');
                }
                if (email.val() === '' || !validateEmail(email.val())) {
                    email.addClass('is-invalid');
                    email.attr('for', 'floatingInputInvalid');
                    password.addClass('is-invalid');
                    allFilled = false;
                } else {
                    email.removeClass('is-invalid');
                }
                if (password.val() === '') {
                    password.addClass('is-invalid');
                    password.attr('for', 'floatingInputInvalid');
                    allFilled = false;
                } else {
                    password.removeClass('is-invalid');
                }
                if (companyCode.val() === '') {
                    companyCode.addClass('is-invalid');
                    companyCode.attr('for', 'floatingInputInvalid');
                    allFilled = false;
                } else {
                    companyCode.removeClass('is-invalid');
                }
                if (allFilled){
                    $.post('php/login/registration.php', {name: name.val(), surname: surname.val(),email: email.val(), password: password.val(), companyCode: companyCode.val().toString()})
                        .done(function (resp){
                            if (resp === 'userAlreadyRegistered') { //significherà che l'utente è gia presente quindi fara tornare alla pagina login con un modal
                                $('#errorRegistrationLabel').html("Le credenziali che hai inserito sono già presenti nel nostro database, esegui il login per poter accedere ai nostri servizi.");
                                $('#registrationModal').modal('hide');
                                $('#errorModal').modal('show');
                            } else {
                                $('#afterRegistrationLabel').html("La registrazione è avvenuta con successo. Riceverai una mail in cui dovrai confermare la tua registrazione.");
                                $('#registrationModal').modal('hide');
                                $('#justRegistered').modal('show');
                            }
                        })
                        .fail(function (){
                            $('#errorRegistrationLabel').html("La tua registrazione non è andata come ci aspetavamo. Qualcosa è andato storto, contattaci per risolvere il problema.");
                            $('#registrationModal').modal('hide');
                            $("#errorModal").modal('show');
                        })
                }
            });
        });
        $('#registrationModal').on('hide.bs.modal', function (e) {
            document.getElementById("registrationModal").querySelector('form').reset();
            $('#name').removeClass('is-invalid');
            $('#surname').removeClass('is-invalid');
            $('#emailRegistration').removeClass('is-invalid');
            $('#passwordRegistration').removeClass('is-invalid');
            $('#companyCode').removeClass('is-invalid');
        });


        $('#retrievePassword').on('shown.bs.modal', function (e) {
            $('#recoveryButton').on('click',function () {
                let email = $('#recovery-email');
                let filled = true;

                if (email.val() === '' || !validateEmail(email.val())) {
                    email.addClass('is-invalid');
                    email.attr('for', 'floatingInputInvalid');
                    filled = false;
                } else {
                    email.removeClass('is-invalid');
                }
                if (filled){
                    //backend
                }
            });
        });
        $('#retrievePassword').on('hide.bs.modal', function (e) {
            document.getElementById("retrievePassword").querySelector('form').reset();
            $('#recovery-email').removeClass('is-invalid');
        });
    </script>
    </body>
    </html>
    <?php
}
?>