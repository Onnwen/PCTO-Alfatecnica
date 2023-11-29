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
        $updateSectionIndex = 0;
        while ($_POST[$updateSectionIndex . "updateSectionId"] !== null) {
            $pdo->query("UPDATE Form_Sections SET name = '" . $_POST[$updateSectionIndex . "updateSectionName"] . "' WHERE section_id = '" . $_POST[$updateSectionIndex . "updateSectionId"] . "';");
            $updateSectionIndex++;
        }

        $newSectionIndex = 0;
        while ($_POST[$newSectionIndex . "newSectionName"] !== null) {
            $pdo->query("INSERT INTO Form_Sections (name) VALUES ('" . $_POST[$newSectionIndex . "newSectionName"] . "');");
            $newSectionId = $pdo->lastInsertId();

            $newFieldIndex = 0;
            while ($_POST[$newFieldIndex . "newFieldNameWithoutSection"] !== null) {
                $question = $_POST[$newFieldIndex . "newFieldWithoutSection"];
                $sectionIdFromFrontend = $_POST[$newSectionIndex . "newSectionId"];
                if ($_POST[$newFieldIndex . "newFieldWithoutSection"] == $_POST[$newSectionIndex . "newSectionId"]){
                    $pdo->query("INSERT INTO Form_Fields (product_category_id, question, section_id) VALUES ('" . $productCategoryId . "', '" . $_POST[$newFieldIndex . "newFieldNameWithoutSection"] . "', '" . $newSectionId . "');");
                }
                $newFieldIndex++;
            }
            $newSectionIndex++;
        }

        $deleteSectionIndex = 0;
        while ($_POST[$deleteSectionIndex . "deleteSectionId"] !== null) {
            $pdo->query("DELETE FROM Form_Sections WHERE section_id = '" . $_POST[$deleteSectionIndex . "deleteSectionId"] . "';");
            $deleteSectionIndex++;
        }

        $deleteFieldIndex = 0;
        while ($_POST[$deleteFieldIndex . "deleteFieldId"] !== null) {
            $pdo->query("DELETE FROM Form_Fields WHERE field_id = '" . $_POST[$deleteFieldIndex . "deleteFieldId"] . "';");
            $deleteFieldIndex++;
        }

        $newFieldIndex = 0;
        while ($_POST[$newFieldIndex . "newFieldName"] !== null) {
            $pdo->query("INSERT INTO Form_Fields (product_category_id, question, section_id) VALUES ('" . $productCategoryId . "', '" . $_POST[$newFieldIndex . "newFieldName"] . "', '" . $_POST[$newFieldIndex . "newFieldSectionId"] . "');");
            $newFieldIndex++;
        }

        $updateFieldIndex = 0;
        while ($_POST[$updateFieldIndex . "updateFieldId"] !== null) {
            $pdo->query("UPDATE Form_Fields SET question = '" . $_POST[$updateFieldIndex . "updateFieldName"] . "' WHERE field_id = '" . $_POST[$updateFieldIndex . "updateFieldId"] . "';");
            $updateFieldIndex++;
        }
    }

    $pdo->commit();
} catch (Exception $e) {
    echo $e;
    http_response_code(400);
    exit;
}
