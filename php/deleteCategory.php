<?php
# FIXME: Usare DELETE invece di POST

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

$idCategory = isset($_POST['idCategory']) ? $_POST['idCategory'] : null;
$idCompany = isset($_POST['idCompany']) ? $_POST['idCompany'] : null;

if (is_null($idCategory) || is_null($idCompany)) {
    http_response_code(400);
    exit();
}

$deleteRevisions = "DELETE FROM Revisions WHERE product_category_id = :id AND company_id = :idCompany";

$res = $pdo->prepare($deleteRevisions);
$res->bindParam(":id", $idCategory, PDO::PARAM_INT);
$res->bindParam(":idCompany", $idCompany, PDO::PARAM_INT);
$res->execute();

$delete = "DELETE FROM Sold_Products WHERE product_category_id = :id AND company_id = :idCompany";
$res = $pdo->prepare($delete);
$res->bindParam(":id", $idCategory, PDO::PARAM_INT);
$res->bindParam(":idCompany", $idCompany, PDO::PARAM_INT);
$res->execute();

exit();
?>
