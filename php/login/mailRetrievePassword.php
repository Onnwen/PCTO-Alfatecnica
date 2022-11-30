<?php
    require('../connessione.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    require '../../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
    require '../../vendor/autoload.php';
    $mail = $_POST["email"];

    if (isset($mail)){
        $select = "SELECT first_name as name, stringRetrievePassword as stringVerify
           FROM Users
           WHERE email = '$mail'";
        $pre = $pdo->prepare($select);
        $pre->execute();
        $check = $pre->fetch(PDO::FETCH_ASSOC);
        if ($check){
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
            $mailer->addAddress($mail);
            $mailer->isHTML(true);

            $mailer->Subject = "Recupero password Alfatecnica";
            $mailer->Body = '<?php $url = "https://thecouriernv.tplinkdns.com/PCTO-Alfatecnica-PrivateLogin/pages/resetPassword.php?stringpasswordretriver=' . $check["stringVerify"] .'"; require_once("../../email/reset-password-email.php"); ?>';

            $mailer-> send();
        }
    }
?>