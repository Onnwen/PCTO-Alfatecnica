<?php
require_once('../connessione.php');

$idUser = $_POST['idUser'];
$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$oldPassword = password_hash($oldPassword,PASSWORD_DEFAULT);
$newPassword = password_hash($newPassword,PASSWORD_DEFAULT);

if ((isset($oldPassword) || $oldPassword !== '')&&(isset($newPassword) || $newPassword !== '')){
    $select = "SELECT hashed_password AS password
           FROM Users
           WHERE user_id = $idUser";
    $pre = $pdo->prepare($select);
    $pre->execute();
    $check = $pre->fetch(PDO::FETCH_ASSOC);
    if (password_verify($oldPassword,$check['password'])){
        $update = "UPDATE Users SET hashed_password = '$newPassword'";
        $res = $pdo->query($update);
        if ($res)
            echo 'correctModify';
        else
            echo 'newPaswordException';
    } else {
        echo 'oldPasswordException';
    }
    exit;
} else if (isset($newPassword) || $newPassword !== ''){
    $update = "UPDATE Users SET hashed_password = '$newPassword'";
    $res = $pdo->query($update);
    if ($res)
        echo 'correctModify';
    else
        echo 'newPaswordException';
}
