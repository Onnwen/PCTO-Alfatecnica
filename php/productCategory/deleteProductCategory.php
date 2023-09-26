<?php
# FIXME: Usare DELETE invece che POST!

require_once('../connessione.php');
require_once("../authentication/authentication.php");

if (!$isAuthenticated) {
    http_response_code(401);
    exit();
}

if (!$isTechnician) {
    http_response_code(403);
    exit();
}

$productCategoryId = isset($_POST['id']) ? $_POST['id'] : 0;

if ($productCategoryId == 0) {
    http_response_code(400);
    exit();
}

# FIXME: Cancellare il file con l'icona

$delete = "DELETE FROM Product_Category WHERE product_category_id = :id";
$res = $pdo->prepare($delete);
$res->bindParam(":id", $productCategoryId, PDO::PARAM_INT);
$res->execute();

exit();
?>
