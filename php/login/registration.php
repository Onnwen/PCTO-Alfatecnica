<?php
session_start();
require_once('../connessione.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../../vendor/autoload.php';

$name = isset($_POST['name']) ? $_POST['name'] : '';
$surname = isset($_POST['surname']) ? $_POST['surname'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$companyCode = isset($_POST['companyCode']) ? $_POST['companyCode'] : '';
$password = password_hash($password,PASSWORD_DEFAULT);

$insertUser =
    "INSERT INTO Users (`email`,`hashed_password`,`first_name`,`last_name`,`role`,`active`)
        values ('".$email."' , '".$password."' , '".$name."' , '".$surname."' , 1 , 0)"; //after everyone must be only user and not admin(1)
$insertUser_Company =
    "INSERT INTO User_Company (`user_id`,`company_id`)
        VALUES ((SELECT Users.user_id FROM Users WHERE Users.email = '".$email ."'), (SELECT id FROM Companies WHERE Companies.unique_Code = '".$companyCode."'))";
$select = "SELECT email, first_name
           FROM Users
           WHERE email = '". $email ."';";

$pre = $pdo->prepare($select);
$pre->execute();
$check = $pre->fetch(PDO::FETCH_ASSOC);
if(!$check){
    try {
        $pre = $pdo->prepare($insertUser);
        $pre->execute();
        $pre = $pdo->prepare($insertUser_Company);
        $pre->execute();

        $mailer = new PHPMailer;
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->SMTPSecure = 'ssl';
        $mailer->Port = 465;
        $mailer->Username = 'alfatecnicasrl.mailer@gmail.com';
        $mailer->Password = 'udmfxeagmfccdfuh';
        $mailer->From = 'alfatecnicasrl.mailer@gmail.com';
        $mailer->Sender = 'alfatecnicasrl.mailer@gmail.com';
        $mailer->addAddress($email);
        $mailer->isHTML(true);

        $mailer->Subject = "Recupero password Alfatecnica";

        $mailer->Body = '<!DOCTYPE html>
                            <html>
                            <head>
                                <meta name="viewport" content="width=device-width">
                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                <title>Passowrd dimenticata</title>
                                <style>
                                    /* -------------------------------------
                                        GLOBAL RESETS
                                    ------------------------------------- */
                                    img {
                                        border: none;
                                        -ms-interpolation-mode: bicubic;
                                        max-width: 100%;
                                    }
                            
                                    body {
                                        background-color: #f6f6f6;
                                        font-family: sans-serif;
                                        -webkit-font-smoothing: antialiased;
                                        font-size: 14px;
                                        line-height: 1.4;
                                        margin: 0;
                                        padding: 0;
                                        -ms-text-size-adjust: 100%;
                                        -webkit-text-size-adjust: 100%;
                                    }
                            
                                    table {
                                        border-collapse: separate;
                                        mso-table-lspace: 0pt;
                                        mso-table-rspace: 0pt;
                                        width: 100%;
                                    }
                            
                                    table td {
                                        font-family: sans-serif;
                                        font-size: 14px;
                                        vertical-align: top;
                                    }
                            
                                    /* -------------------------------------
                                        BODY & CONTAINER
                                    ------------------------------------- */
                            
                                    /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                                    .container {
                                        display: block;
                                        margin: 0 auto !important;
                                        /* makes it centered */
                                        max-width: 580px;
                                        padding: 10px;
                                        width: 580px;
                                    }
                            
                                    /* This should also be a block element, so that it will fill 100% of the .container */
                                    .content {
                                        box-sizing: border-box;
                                        display: block;
                                        max-width: 580px;
                                        background-color: white;
                                        margin: 30px auto;
                                        padding: 10px 40px 20px;
                                        border-radius: 12px;
                                    }
                            
                                    .footer td,
                                    .footer p,
                                    .footer span,
                                    .footer a {
                                        color: #999999;
                                        font-size: 12px;
                                        text-align: center;
                                    }
                            
                                    /* -------------------------------------
                                        TYPOGRAPHY
                                    ------------------------------------- */
                                    h1,
                                    h2,
                                    h3,
                                    h4 {
                                        color: #000000;
                                        font-family: sans-serif;
                                        font-weight: 400;
                                        line-height: 1.4;
                                        margin: 0;
                                        margin-bottom: 30px;
                                    }
                            
                                    h1 {
                                        font-size: 35px;
                                        font-weight: 300;
                                        text-align: center;
                                        text-transform: capitalize;
                                    }
                            
                                    p,
                                    ul,
                                    ol {
                                        font-family: sans-serif;
                                        font-size: 14px;
                                        font-weight: normal;
                                        margin: 0;
                                        margin-bottom: 15px;
                                    }
                            
                                    p li,
                                    ul li,
                                    ol li {
                                        list-style-position: inside;
                                        margin-left: 5px;
                                    }
                            
                                    /* -------------------------------------
                                        BUTTONS
                                    ------------------------------------- */
                                    .btn {
                                        box-sizing: border-box;
                                        width: 100%;
                                    }
                            
                                    .btn > tbody > tr > td {
                                        padding-bottom: 15px;
                                    }
                            
                                    .btn table {
                                        width: auto;
                                    }
                            
                                    .btn table td {
                                        background-color: #ffffff;
                                        border-radius: 5px;
                                        text-align: center;
                                    }
                            
                                    a {
                                        background-color: #1fa67b;
                                    !important;
                                        color: #ffffff;
                                    !important;
                                        border-radius: 5px;
                                        box-sizing: border-box;
                                        cursor: pointer;
                                        display: inline-block;
                                        font-size: 14px;
                                        font-weight: bold;
                                        padding: 12px 25px;
                                        text-decoration: none;
                                        text-transform: capitalize;
                                        margin: 15px 0 20px;
                                        transition: ease-in-out 100ms;
                                    }
                            
                                    a:hover {
                                        background-color: #157347 !important;
                                        color: #ffffff !important;
                                    }
                            
                                    .powered-by a {
                                        text-decoration: none;
                                    }
                            
                                    hr {
                                        border: 0;
                                        border-bottom: 1px solid #f6f6f6;
                                        margin: 20px 0;
                                    }
                            
                                    /* -------------------------------------
                                        RESPONSIVE AND MOBILE FRIENDLY STYLES
                                    ------------------------------------- */
                                    @media only screen and (max-width: 620px) {
                                        table[class=body] h1 {
                                            font-size: 28px !important;
                                            margin-bottom: 10px !important;
                                        }
                            
                                        table[class=body] p,
                                        table[class=body] ul,
                                        table[class=body] ol,
                                        table[class=body] td,
                                        table[class=body] span,
                                        table[class=body] a {
                                            font-size: 16px !important;
                                        }
                            
                                        table[class=body] .wrapper,
                                        table[class=body] .article {
                                            padding: 10px !important;
                                        }
                            
                                        table[class=body] .content {
                                            padding: 0 !important;
                                        }
                            
                                        table[class=body] .container {
                                            padding: 0 !important;
                                            width: 100% !important;
                                        }
                            
                                        table[class=body] .main {
                                            border-left-width: 0 !important;
                                            border-radius: 0 !important;
                                            border-right-width: 0 !important;
                                        }
                            
                                        table[class=body] .btn table {
                                            width: 100% !important;
                                        }
                            
                                        table[class=body] .btn a {
                                            width: 100% !important;
                                        }
                            
                                        table[class=body] {
                                            height: auto !important;
                                            max-width: 100% !important;
                                            width: auto !important;
                                        }
                                    }
                            
                                    /* -------------------------------------
                                        PRESERVE THESE STYLES IN THE HEAD
                                    ------------------------------------- */
                                    @media all {
                                        .apple-link a {
                                            color: inherit !important;
                                            font-family: inherit !important;
                                            font-size: inherit !important;
                                            font-weight: inherit !important;
                                            line-height: inherit !important;
                                            text-decoration: none !important;
                                        }
                                    }
                                </style>
                            </head>
                            <body class="">
                            <div class="content">
                                <center>
                                    <img class="center" src="https://thecouriernv.tplinkdns.com/PCTO-Alfatecnica-Staging/img/logo.png" height="200" alt="Alfatecnica">
                                </center>
                                <p>Buongiorno ' . $check["first_name"] .',</p>
                                <p>Ricevi questa mail perch&eacute hai segnalato di aver dimenticato la tua password. Utilizza il tasto sottostante per cambiare credenziali di accesso.</p>
                                <center>
                                    <a class="center" href="https://thecouriernv.tplinkdns.com/PCTO-Alfatecnica-PrivateLogin/pages/registrationConfirm.php?email='. $check['email'] .'" target="_blank">Cambia password</a>
                                </center>
                            </div>
                            
                            <center>
                                <?php require_once("../pages/footer.php"); ?>
                            </center>
                            </body>
                            </html>';
        $mailer-> send();
        echo "mailDone";
    } catch (Exception $e) {
        echo $e;
        http_response_code(400);
        exit;
    }
}else{
    echo "userAlreadyRegistered";
    exit;
}
?>