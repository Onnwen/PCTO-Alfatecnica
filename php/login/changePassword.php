<?php
require_once('../connessione.php');
error_reporting(E_ERROR | E_PARSE);
$idUser = $_POST['idUser'];
$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];


if ((isset($oldPassword) || $oldPassword !== null)&&(isset($newPassword) || $newPassword !== '')){
    $oldPassword = password_hash($oldPassword,PASSWORD_DEFAULT);
    $newPassword = password_hash($newPassword,PASSWORD_DEFAULT);
    $select = "SELECT hashed_password AS password
           FROM Users
           WHERE user_id = $idUser";
    $pre = $pdo->prepare($select);
    $pre->execute();
    $check = $pre->fetch(PDO::FETCH_ASSOC);
    if (password_verify($oldPassword,$check['password'])){
        $update = "UPDATE Users SET hashed_password = '$newPassword' WHERE user_id = '". $idUser ."'";
        $res1 = $pdo->query($update);
        $query = "UPDATE Users
                SET stringRetrievePassword = null
                WHERE user_id = '". $idUser ."';";
        $res2 = $pdo->query($query);
        if ($res1 && $res2)
            echo 'correctModify';
        else
            echo 'newPaswordException';
    } else {
        echo 'oldPasswordException';
    }
    exit;
} else if (isset($newPassword) || $newPassword !== ''){
    $newPassword = password_hash($newPassword,PASSWORD_DEFAULT);
    $update = "UPDATE Users SET hashed_password = '$newPassword' WHERE user_id = '". $idUser ."'";
    $res1 = $pdo->query($update);
    $query = "UPDATE Users
                SET stringRetrievePassword = null
                WHERE user_id = '". $idUser ."';";
    $res2 = $pdo->query($query);
    if ($res1 && $res2)
        echo 'correctModify';
    else
        echo 'newPaswordException';
}
