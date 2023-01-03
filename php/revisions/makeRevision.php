<?php
require_once("../connessione.php");
require_once("../authentication/authentication.php");

if (!$isAuthenticated) {
    http_response_code(401);
    exit();
}

if (!$isTechnician) {
    http_response_code(403);
    exit();
}

$revisionedProduct = isset($_POST["product"]) ? $_POST["product"] : null;
$revisionedCompany = isset($_POST["company"]) ? $_POST["company"] : null;
$revisionDate = isset($_POST["revisionDate"]) ? $_POST["revisionDate"] : null;

if (is_null($revisionedCompany) || is_null($revisionedProduct) || is_null($revisionDate)) {
    http_response_code(400);
    exit();
}

$query = "INSERT INTO Revisions(product_category_id, company_id, data) VALUES(:product_category_id, :company_id, :data)";
$pre = $pdo->prepare($query);

$pre->bindParam(":product_category_id", $revisionedProduct, PDO::PARAM_INT);
$pre->bindParam(":company_id", $revisionedCompany, PDO::PARAM_INT);
$pre->bindParam(":data", $revisionDate, PDO::PARAM_STR);

$pre->execute();
exit();