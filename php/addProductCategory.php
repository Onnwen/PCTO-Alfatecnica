<?php
require_once('connessione.php');

$productCategoryName = $_POST["productCategory_name"];
$iconPath = $_POST["icon_path"];

try {
    $pdo->beginTransaction();
    $pdo->query("INSERT INTO Product_Category (name, visualization_type, icon_image_path) VALUES ('" . $productCategoryName . "', 0, '" . $iconPath . "')");

    $fieldId = 0;
    while ($_GET($fieldId) !== null) {
        $pdo->query("INSERT INTO Product_Fields (product_category_id, name) VALUES (LAST_INSERT_ID(), '" . $_GET($fieldId) . "')");
    }
    $pdo->commit();
} catch (Exception $e) {
    echo $e;
    http_response_code(400);
    exit;
}