<?php
if (isset($_POST["user_id"]) && isset($_POST["confirmed"])) {
    $userId = $_POST["user_id"];
    $confirmed = $_POST["confirmed"];
    if ($confirmed) {
        $pdo->query("UPDATE Users SET active = " . $confirmed . " WHERE user_id = " . $userId . ";");
    }
    else {
        include 'deleteUser.php';
    }
}
else {
    http_response_code(400);
    exit;
}