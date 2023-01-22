<?php
require_once('connessione.php');
$user_id = $_POST['user_id'];
$select = "SELECT *
                   FROM Users
                   WHERE user_id = $user_id;";
$pre = $pdo->prepare($select);
$pre->execute();
$check = $pre->fetchAll(PDO::FETCH_ASSOC);
if(!$check){
    echo "error";
    exit;
} else {
    echo json_encode($check);
    exit;
}
?>