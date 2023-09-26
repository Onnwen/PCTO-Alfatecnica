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

$productId = isset($_POST['product_id']) ? $_POST['product_id'] : null;
$fieldId = isset($_POST['field_id']) ? $_POST['field_id'] : null;
$newValue = isset($_POST['value']) ? $_POST['value'] : null;

if (is_null($productId) || is_null($fieldId) || is_null($newValue)) {
    http_response_code(400);
    exit();
}

$updProd = "UPDATE Product_Data SET Product_Data.value = '".$newValue."' WHERE Product_Data.sold_product_id = '".$productId."' AND Product_Data.field_id = '".$fieldId."'";
$res = $pdo->query($updProd);

exit();
