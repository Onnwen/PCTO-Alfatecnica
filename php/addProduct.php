<?php
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

$companyId = isset($_POST["company_id"]) ? $_POST["company_id"] : null;
$productCategoryId = isset($_POST["product_category_id"]) ? $_POST["product_category_id"] : null;

$x = isset($_POST["x"]) ? $_POST["x"] : null;
$y = isset($_POST["y"]) ? $_POST["y"] : null;

$date = isset($_POST["date"]) ? $_POST["date"] : null;

if (is_null($companyId) || is_null($productCategoryId) || is_null($x) || is_null($y) || is_null($date)) {
    http_response_code(400);
    exit();
}

$productFieldsSql = "SELECT Product_Fields.field_id, Product_Fields.name FROM Product_Fields WHERE Product_Fields.product_category_id = :id;";
$productFieldsQuery = $pdo->prepare($productFieldsSql);
$productFieldsQuery->bindParam(':id', $productCategoryId, PDO::PARAM_INT);
$productFieldsQuery->execute();

$pdo->beginTransaction();
$pdo->query("INSERT INTO Sold_Products(`company_id`, `product_category_id`, `x`, `y`) VALUES (" . $companyId . ", " . $productCategoryId . ", " . $x . ", " . $y . ");");
while ($row = $productFieldsQuery->fetch(PDO::FETCH_ASSOC)) {
    $productFields[] = array(
        "field_id" => $row["field_id"],
        "field_name" => $row["name"]
    );
    $pdo->query("INSERT INTO Product_Data(`sold_product_id`, `field_id`, `value`) VALUES (LAST_INSERT_ID(), '" . $row["field_id"] . "', '" . $_POST[$row["field_id"]] . "');");
}
$pdo->query("INSERT INTO Revisions(`product_category_id`, `company_id`, `data`) VALUES (" . $productCategoryId . ", " . $companyId . ", '" . $date . "');");
$pdo->commit();

exit();