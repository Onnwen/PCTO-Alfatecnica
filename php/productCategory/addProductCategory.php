<?php
require_once('../connessione.php');

$productCategoryName = $_POST["name"];
$visualizationType = $_POST["type"];
$iconPath = (isset($_POST["icon_path"]) ? $_POST('icon_path') : "");

try {
    $pdo->beginTransaction();
    $pdo->query("INSERT INTO Product_Category (name, type, icon_image_path) VALUES ('" . $productCategoryName . "', '". $visualizationType . "', '" . $iconPath . "')");

    $newProductCategoryId = $pdo->lastInsertId();
    $pdo->commit();

    if ($visualizationType == 0) {
        $fieldId = 0;
        $pdo->beginTransaction();
        while ($_POST[$fieldId . "input"] !== null) {
            $pdo->query("INSERT INTO Product_Fields (product_category_id, name) VALUES ('" . $newProductCategoryId . "', '" . $_POST[$fieldId . "input"] . "')");
            $fieldId++;
        }
        $pdo->commit();
    }
    else {
        $sectionId = 0;
        while ($_POST[$sectionId . "sectionName"] !== null) {
            $pdo->beginTransaction();
            $pdo->query("INSERT INTO Form_Sections (name) VALUES ('" . $_POST[$sectionId . "sectionName"] . "')");
            $newSectionId = $pdo->lastInsertId();
            $pdo->commit();

            $fieldId = 0;
            $pdo->beginTransaction();
            while ($_POST[$sectionId . $fieldId . "fieldName"] !== null) {
                $pdo->query("INSERT INTO Form_Fields (product_category_id, question, section_id) VALUES ('" . $newProductCategoryId . "', '" . $_POST[$sectionId . $fieldId . "fieldName"] . "', '" . $newSectionId . "')");
                $fieldId++;
            }
            $pdo->commit();
            $sectionId++;
        }
    }
} catch (Exception $e) {
    echo $e;
    http_response_code(400);
    exit;
}