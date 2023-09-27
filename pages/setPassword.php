<?php
session_start();
require_once('../php/connessione.php');
if (isset($_SESSION['session_id'])) {
    header('location: pages/lista-anagrafica.php');
} else {
    $email = $_GET['email'];
    if (isset($email)) {
        $query = "SELECT user_id as idUser FROM Users WHERE email = '$email'";
        $pre = $pdo->prepare($query);
        $pre->execute();
        $check = $pre->fetch(PDO::FETCH_ASSOC);
        $idUser = $check['idUser'];
        ?>
        <html>

        <head>
            <title>Recupera password</title>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css">
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css'>
            <link rel="stylesheet" href="../style.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/c0c3eed4d9.js" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script>
                $(document).ready(function() {
                    console.log('ready');
                    $("#show_hide_password a").on('click', function(event) {
                        event.preventDefault();
                        if($('#show_hide_password input').attr("type") == "text"){
                            $('#show_hide_password input').attr('type', 'password');
                            $('#show_hide_password i').addClass( "fa-eye-slash" );
                            $('#show_hide_password i').removeClass( "fa-eye" );
                        }else if($('#show_hide_password input').attr("type") == "password"){
                            $('#show_hide_password input').attr('type', 'text');
                            $('#show_hide_password i').removeClass( "fa-eye-slash" );
                            $('#show_hide_password i').addClass( "fa-eye" );
                        }
                    });
                    $("#show_hide_password2 a").on('click', function(event) {
                        event.preventDefault();
                        if($('#show_hide_password2 input').attr("type") == "text"){
                            $('#show_hide_password2 input').attr('type', 'password');
                            $('#show_hide_password2 i').addClass( "fa-eye-slash" );
                            $('#show_hide_password2 i').removeClass( "fa-eye" );
                        }else if($('#show_hide_password2 input').attr("type") == "password"){
                            $('#show_hide_password2 input').attr('type', 'text');
                            $('#show_hide_password2 i').removeClass( "fa-eye-slash" );
                            $('#show_hide_password2 i').addClass( "fa-eye" );
                        }
                    });
                });
                const idUser = <?php echo $idUser?>;

                const validatePassword = (password) => {
                    return password.match(
                        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
                    );
                };
                function updateDB() {
                    debugger;
                    let newPassword = $('#newPassword');
                    let confirmPassword = $('#confirmPassword');
                    valueControl = true;
                    if(newPassword.val() === '' || !validatePassword(newPassword.val())){
                        newPassword.addClass('is-invalid');
                        newPassword.attr('for', 'floatingInputInvalid');
                        valueControl = false;
                    } else {
                        newPassword.removeClass('is-invalid');
                    }
                    if (confirmPassword.val() === '' || !validatePassword(confirmPassword.val())){
                        confirmPassword.addClass('is-invalid');
                        confirmPassword.attr('for', 'floatingInputInvalid');
                        valueControl = false;
                    } else {
                        confirmPassword.removeClass('is-invalid');
                    }
                    console.log(valueControl);
                    if(valueControl){
                        $.post('../php/login/changePassword.php', {idUser: idUser, newPassword: newPassword.val()})
                            .done(function (response){
                                if(response === "correctModify"){
                                    $('#justChanged').modal('show');
                                } else {
                                    $('#errorModal').modal('show');
                                }
                            })
                            .fail(function (){
                                    $('#errorModal').modal('show');
                                }
                            )
                    }
                }
            </script>
            <style>
                #resetPassword {
                    padding-top: 50px;
                    height: 100vh;
                    align-items: center
                }
                #resetPassword .form-wrap {
                    width: 30%;
                    margin: 0 auto;
                }
                #resetPassword h1 {
                    color: #1fa67b;
                    font-size: 18px;
                    text-align: center;
                    font-weight: bold;
                    padding-bottom: 20px;
                }
                #resetPassword .form-group {
                    margin-bottom: 25px;
                }
                #resetPassword .checkbox {
                    margin-bottom: 20px;
                    position: relative;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    -o-user-select: none;
                    user-select: none;
                }
                #resetPassword .checkbox.show:before {
                    content: '\e013';
                    color: #1fa67b;
                    font-size: 17px;
                    margin: 1px 0 0 3px;
                    position: absolute;
                    pointer-events: none;
                    font-family: 'Glyphicons Halflings';
                }
                #resetPassword .checkbox .character-checkbox {
                    width: 25px;
                    height: 25px;
                    cursor: pointer;
                    border-radius: 3px;
                    border: 1px solid #ccc;
                    vertical-align: middle;
                    display: inline-block;
                }
                #resetPassword .checkbox .label {
                    color: #6d6d6d;
                    font-size: 13px;
                    font-weight: normal;
                }
                #resetPassword .btn.btn-outline-success {
                    font-size: 14px;
                    margin-bottom: 20px;
                    border-color: #1fa67b;
                    color: #1fa67b;
                }
                #resetPassword .btn.btn-outline-success:hover {
                    border-color: #1fa67b;
                    background-color: #1fa67b;
                    color: #fff;
                }
                #resetPassword .btn.btn-success {
                    font-size: 14px;
                    margin-bottom: 20px;
                    border-color: #1fa67b;
                    color: #fff;
                }
                #resetPassword .btn.btn-success:hover {
                    border-color: #157347;
                    color: #fff;
                }

                #resetPassword .forget {
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
        </head>

        <body>
        <div class="container" style="height: 100vh;align-items: center">
            <div id="resetPassword" class=" row align-items-center" >
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-8" >
                            <div class="form-wrap w-100 p-md-5 p-sm-1" style="background: rgba(109,109,109,0.09);width: 500px;border-radius: 20px">
                                <p style="width: 100%;color: #1fa67b;font-size: 30px;text-align: center">Reimposta Password</p>
                                <label id="errorLabel" style="width: 100%;color: red; text-align: center"></label>
                                <form role="form" action="javascript:0;" method="post" id="resetPassword-form" autocomplete="on" >
                                    <div class="form-group">
                                        <label for="newPassword">Nuova password:</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" class="form-control" placeholder="Nuova password" id="newPassword"><br>
                                            <div class="input-group-addon">
                                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword">Conferma password:</label>
                                        <div class="input-group" id="show_hide_password2">
                                            <input type="password" class="form-control" placeholder="Conferma password" id="confirmPassword"><br>
                                            <div class="input-group-addon">
                                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success m-lg-1" onclick="updateDB()">Conferma</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal successo -->
        <div class="modal fade" id="justChanged" tabindex="-1" aria-labelledby="changePasswordLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: darkgreen" id="changedLabel">La password è stata reimpostata</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="afterChangedLabel">
                        Le password è stata settata ora puoi fare il login per accedere ai nostri servizi. Premendo "Ok" verrai reinderizzato al login.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='../index.php'">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal errore -->
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="color: darkred" id="errorModalLabel">È stato riscontrato un problema</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label id="errorRegistrationLabel">La tua password non è stata settata correttamente. Ci scusiamo per il disagio.</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.href='../index.php'">Ok</button>
                    </div>
                </div>
            </div>
        </div>


        </body>

        </html>
        <?php
    }
}
?>
