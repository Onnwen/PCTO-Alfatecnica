<?php
require_once("../connessione.php");

$revisionedProduct = isset($_POST["product"]) ? $_POST["product"] : "";
$revisionedCompany = isset($_POST["company"]) ? $_POST["company"] : "";
$revisionDate = isset($_POST["revisionDate"]) ? $_POST["revisionDate"] : "";

if ($revisionedCompany == "" || $revisionedProduct == "" || $revisionDate == "") {
    http_response_code(400);
    die();
}

# FIXME: Controlla che l'utente sia autenticato come admin
$query = "INSERT INTO Revisions(product_category_id, company_id, data) VALUES(:product_category_id, :company_id, :data)";
$pre = $pdo->prepare($query);

$pre->bindParam(":product_category_id", $revisionedProduct, PDO::PARAM_INT);
$pre->bindParam(":company_id", $revisionedCompany, PDO::PARAM_INT);
$pre->bindParam(":data", $revisionDate, PDO::PARAM_STR);

$pre->execute();

exit();