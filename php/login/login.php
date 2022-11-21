<?php
session_start();
require_once('../connessione.php');

$email = isset($_POST['email']) ? $_POST['email'] : '';
$pw = isset($_POST['pw']) ? $_POST['pw'] : '';

$select = "SELECT email, hashed_password AS password
           FROM Users
           WHERE email = :email";
$pre = $pdo->prepare($select);
$pre->bindParam(':email', $email, PDO::PARAM_STR);
$pre->execute();
$check = $pre->fetch(PDO::FETCH_ASSOC);
if(!$check){
  echo 'userWrong';
} else {
  if (password_verify($pw,$check['password'])){
    session_regenerate_id();
    $_SESSION['session_id'] = session_id();
    $_SESSION['session_email'] = $check['email'];
    echo 'login';
  } else {
    echo 'userWrong';
  }
  exit;
}
 ?>
