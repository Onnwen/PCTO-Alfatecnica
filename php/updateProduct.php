<?php
# FIXME: Usare PUT invece che POST!

require_once('connessione.php');
require_once("authentication/authentication.php");

if (!$isAuthenticated) {
    http_response_code(401);
    exit();
}

if (!$isTechnician) {
    http_response_code(403);
    exit();
}

$idProd = isset($_POST['id']) ? $_POST['id'] : null;
$newPosX = isset($_POST['newPosX']) ? $_POST['newPosX'] : null;
$newPosY = isset($_POST['newPosY']) ? $_POST['newPosY'] : null;


if (is_null($idProd) || is_null($newPosX) || is_null($newPosY)) {
    http_response_code(400);
    exit();
}

$updProd = "UPDATE Sold_Products SET x = '" . $newPosX . "', y = '" . $newPosY . "' WHERE sold_product_id = " . $idProd;
$res = $pdo->query($updProd);

# FIXME: Sistemare dopo aver sistemato il frontend
if ($res)
    echo 1;
else
    echo 0;

exit();
