<?php
require_once('../connessione.php');

$productCategoryName = $_POST["name"];
$visualizationType = $_POST["type"];

if (isset($_FILES["icon"])) {
    $icon_image = $_FILES["icon"];
    $target_dir_icon = "img/prodotti/";
    $target_file_icon = $target_dir_icon . $productCategoryName;
    $image_data = getimagesize($icon_image["tmp_name"]);
    $logo_image_width = $image_data[0];
    $logo_image_height = $image_data[1];
    move_uploaded_file($icon_image["tmp_name"], getcwd() . "/../../" . $target_file_icon);
}

try {
    $pdo->beginTransaction();
    $pdo->query("INSERT INTO Product_Category (name, type, icon_image_path) VALUES ('" . $productCategoryName . "', '" . $visualizationType . "', '" . $target_file_icon . "')");

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