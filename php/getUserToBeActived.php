<?php
require_once('connection/connection.php');
$select = "SELECT COUNT(*) AS countUsers
                   FROM Users
                   WHERE activedByCompany = 0;";
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
