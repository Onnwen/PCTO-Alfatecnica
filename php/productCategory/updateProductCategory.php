<?php
require_once('../connessione.php');

$productCategoryId = $_POST["product_category_id"];

try {
    $pdo->beginTransaction();

    $fieldIndex = 0;
    while ($_POST[$fieldIndex . "fieldId"] !== null) {
        $pdo->query("UPDATE Product_Fields SET name = '" . $_POST[$fieldIndex . "fieldName"] . "' WHERE field_id = '" . $_POST[$fieldIndex . "fieldId"] . "')");
        $fieldIndex++;
    }

    $newFieldIndex = 0;
    while ($_POST[$newFieldIndex . "newFieldId"] !== null) {
        $pdo->query("INSERT INTO Product_Fields (product_category_id, name) VALUES ('" . $productCategoryId. "', '" . $_POST[$newFieldIndex . "input"] . "')");
        $newFieldIndex++;
    }
    $pdo->commit();
} catch (Exception $e) {
    echo $e;
    http_response_code(400);
    exit;
}