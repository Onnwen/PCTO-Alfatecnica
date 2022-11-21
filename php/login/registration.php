<?php
session_start();
require_once('../connessione.php');
$name = isset($_POST['name']) ? $_POST['name'] : '';
$surname = isset($_POST['surname']) ? $_POST['surname'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$companyCode = isset($_POST['companyCode']) ? $_POST['companyCode'] : '';
$insertUser =
    "INSERT INTO Users (`email`,`hashed_password`,`first_name`,`last_name`,`role`)
        values ('".$email."' , '".$password."' , '".$name."' , '".$surname."' , 1)"; //after everyone must be only user and not admin(1)
$insertUser_Company =
    "INSERT INTO User_Company (`user_id`,`company_id`)
        VALUES ((SELECT Users.user_id FROM Users WHERE Users.email = '".$email ."'), (SELECT id FROM Companies WHERE Companies.unique_Code = '".$companyCode."'))";
$select = "SELECT email
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
    } catch (Exception $e) {
        echo $e;
        http_response_code(400);
        exit;
    }
}else{
    echo "utenteGiàRegistrato";
}
?>