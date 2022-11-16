<?php
require_once('connessione.php');

$productCategoryName = $_POST["name"];
$iconPath = (isset($_POST["icon_path"]) ? $_POST('icon_path') : "");

try {
    $pdo->beginTransaction();
    $pdo->query("INSERT INTO Product_Category (name, visualization_type, icon_image_path) VALUES ('" . $productCategoryName . "', 0, '" . $iconPath . "')");

    $fieldId = 0;
    $newProductCategoryId = $pdo->lastInsertId();
    while ($_POST[$fieldId . "input"] !== null) {
        $pdo->query("INSERT INTO Product_Fields (product_category_id, value) VALUES ('" . $newProductCategoryId. "', '" . $_POST[$fieldId . "input"] . "')");
        $fieldId++;
    }
    $pdo->commit();
} catch (Exception $e) {
    echo $e;
    http_response_code(400);
    exit;
}