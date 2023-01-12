<?php
require_once('connessione.php');

if ($_POST["user_id"]) {
    $userId = $_POST["user_id"];
    $pdo->query("DELETE FROM Users WHERE user_id = " . $userId . ";");
    $pdo->query("DELETE FROM User_Company WHERE user_id = " . $userId . ";");
}
else {
    http_response_code(400);
    exit;
}
