<?php
require_once('../connessione.php');
$mail = isset($_POST['email']) ? $_POST['email'] : 0;
if ($mail != 0) {
    $updProd = "UPDATE Users SET active = '1' WHERE email = '" . $mail . "'";
    $res = $pdo->query($updProd);
    if ($res)
        echo 1;
    else
        echo 0;
}
?>
