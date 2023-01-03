<?php
require_once('../php/connessione.php');
require_once("../php/authentication/authentication.php");

if ($isAuthenticated) {
    header('location: pages/lista-anagrafica.php');
} else {
    $mail = $_GET['email'];
    if (isset($mail)) {
        $query = "SELECT active  FROM Users WHERE email = '$mail'";
        $pre = $pdo->prepare($query);
        $pre->execute();
        $check = $pre->fetch(PDO::FETCH_ASSOC);
        $toBEConfirmed = $check['active'];
        if ($toBEConfirmed == 0) {
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/c0c3eed4d9.js" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
            <script>
                function updateDB(){
                    $.post("../php/login/confirmRegistration.php", {email: "<?php echo $mail; ?>"}, function(response){
                        if(response == "1"){
                            window.location.href = "pages/login.php";
                        } else {
                            alert("Errore nella conferma ci scusiamo per il disagio, riprova più tardi o chiama il supporto");
                        }
                    });
                }
            </script>
        </head>

        <body>
        <div class="container" style="height: 100vh;align-items: center">
            <div id="resetPassword" class=" row align-items-center" >
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-8" >
                            <div class="form-wrap w-100 p-md-5 p-sm-1" style="background: rgba(109,109,109,0.09);width: 500px;border-radius: 20px">
                                <img src="../img/logo.png" style="width: 100%;height: auto" alt="logo">
                                <p style="width: 100%;color: #1fa67b;font-size: 30px;text-align: center">Conferma dell'account</p>
                                <label style="width: 100%; text-align: center">La tua registrazione è stata confermata, ora potrai accedere ai servizi della tua azienda, premendo sul tasto conferma verrai reindirizzato al login, potrai quinci eseguirlo senza problemi. Grazie per la tua registrazione.</label>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success m-lg-1" onclick="updateDB()">Conferma</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </body>

        </html>
        <?php
    } else {
        header("Location: ../index.php");
        }
    }
}
?>