<?php
# FIXME: Usare DELETE al posto di POST
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

if (is_null($idProd)) {
    http_response_code(400);
    exit();
}

$delete = "DELETE FROM Sold_Products WHERE sold_product_id = :id";
$res = $pdo->prepare($delete);
$res->bindParam(":id", $idProd, PDO::PARAM_INT);
$res->execute();
exit();
