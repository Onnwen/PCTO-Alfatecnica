<?php
require_once('../connection/connection.php');

$productCategoryId = $_POST["product_category_id"];
$productCategoryType = $_POST["type"];

try {
    $pdo->beginTransaction();

    $pdo->query("UPDATE Product_Category SET name = '" . $_POST['name'] . "' WHERE product_category_id = '" . $productCategoryId . "';");

    if ($productCategoryType == 0) {
        $updateFieldIndex = 0;
        while ($_POST[$updateFieldIndex . "updateFieldId"] !== null) {
            $pdo->query("UPDATE Product_Fields SET name = '" . $_POST[$updateFieldIndex . "updateFieldName"] . "' WHERE field_id = '" . $_POST[$updateFieldIndex . "updateFieldId"] . "';");
            $updateFieldIndex++;
        }

        $newFieldIndex = 0;
        while ($_POST[$newFieldIndex . "newFieldName"] !== null) {
            $pdo->query("INSERT INTO Product_Fields (product_category_id, name) VALUES ('" . $productCategoryId . "', '" . $_POST[$newFieldIndex . "newFieldName"] . "');");
            $newFieldIndex++;
        }

        $deleteFieldIndex = 0;
        while ($_POST[$deleteFieldIndex . "deleteFieldId"] !== null) {
            $pdo->query("DELETE FROM Product_Fields WHERE field_id = '" . $_POST[$deleteFieldIndex . "deleteFieldId"] . "';");
            $deleteFieldIndex++;
        }
    }
    else {
        foreach($_POST['sectionsToUpdate'] as $sectionToUpdate) {
            $pdo->query("UPDATE Form_Sections SET name = '" . $sectionToUpdate['name'] . "' WHERE section_id = '" . $sectionToUpdate['id'] . "';");
        }

        foreach($_POST['fieldsToUpdate'] as $fieldToUpdate) {
            $pdo->query("UPDATE Form_Fields SET question = '" . $fieldToUpdate['name'] . "' WHERE field_id = '" . $fieldToUpdate['id'] . "';");
        }

        foreach($_POST['fieldsToAdd'] as $fieldToAdd) {
            $pdo->query("INSERT INTO Form_Fields (product_category_id, question, section_id) VALUES ('" . $productCategoryId . "', '" . $fieldToAdd['name'] . "', '" . $fieldToAdd['section_id'] . "');");
        }

        foreach($_POST['sectionsToDelete'] as $sectionToDelete) {
            $pdo->query("DELETE FROM Form_Sections where section_id = '" . $sectionToDelete['id'] . "';");
        }

        foreach($_POST['fieldsToDelete'] as $fieldToDelete) {
            $pdo->query("DELETE FROM Form_Fields where field_id = '" . $fieldToDelete['id'] . "';");
        }

        foreach($_POST['sectionsToAdd'] as $sectionToAdd) {
            $pdo->commit();
            $pdo->beginTransaction();
            $pdo->query("INSERT INTO Form_Sections (name) VALUES ('" . $sectionToAdd['name'] . "')");
            $newSectionId = $pdo->lastInsertId();
            $pdo->commit();

            $pdo->beginTransaction();
            foreach($sectionToAdd['fields'] as $field) {
                $pdo->query("INSERT INTO Form_Fields (product_category_id, question, section_id) VALUES ('" . $productCategoryId . "', '" . $field['name'] . "', '" . $newSectionId . "')");
            }
        }
    }

    $pdo->commit();
} catch (Exception $e) {
    echo $e;
    http_response_code(400);
    exit;
}
