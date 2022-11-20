<?php
require_once('../connessione.php');

$productCategoryId = $_POST["product_category_id"];
$productCategoryType = $_POST["type"];

try {
    $pdo->beginTransaction();

    $updateFieldIndex = 0;
    while ($_POST[$updateFieldIndex . "updateFieldId"] !== null) {
        $pdo->query("UPDATE Product_Fields SET name = '" . $_POST[$updateFieldIndex . "updateFieldName"] . "' WHERE field_id = '" . $_POST[$updateFieldIndex . "updateFieldId"] . "';");
        $updateFieldIndex++;
    }

    $newFieldIndex = 0;
    while ($_POST[$newFieldIndex . "newFieldName"] !== null) {
        $pdo->query("INSERT INTO Product_Fields (product_category_id, name) VALUES ('" . $productCategoryId. "', '" . $_POST[$newFieldIndex . "newFieldName"] . "');");
        $newFieldIndex++;
    }

    $deleteFieldIndex = 0;
    while ($_POST[$deleteFieldIndex . "deleteFieldId"] !== null) {
        $pdo->query("DELETE FROM Product_Fields WHERE field_id = '" . $_POST[$deleteFieldIndex . "deleteFieldId"] . "';");
        $deleteFieldIndex++;
    }

    $pdo->commit();
    echo "success";
} catch (Exception $e) {
    echo $e;
    http_response_code(400);
    exit;
}