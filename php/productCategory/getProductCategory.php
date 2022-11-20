<?php
require_once('../connessione.php');
$productCategoryDataSql = "SELECT name as product_category_name, type, product_category_id FROM Product_Category WHERE product_category_id = :product_category_id;";
$productCategoryData = $pdo->prepare($productCategoryDataSql);
$productCategoryData->bindParam(":product_category_id", $_GET['id'], PDO::PARAM_INT);
$productCategoryData->execute();

$productCategory = $productCategoryData->fetch(PDO::FETCH_ASSOC);

if ($productCategory['type'] == 0) {
    $productCategoryFieldsSql = "SELECT field_id as id, name FROM Product_Fields WHERE product_category_id = :product_category_id;";
    $productCategoryFields = $pdo->prepare($productCategoryFieldsSql);
    $productCategoryFields->bindParam(":product_category_id", $_GET['id'], PDO::PARAM_INT);
    $productCategoryFields->execute();

    while ($field = $productCategoryFields->fetch(PDO::FETCH_ASSOC)) {
        $productCategory['attributes'][] = $field;
    }
} else {
    $productCategoryFieldsSql = "SELECT field_id as id, question as name, section_id FROM Form_Fields WHERE product_category_id = :product_category_id;";
    $productCategoryFields = $pdo->prepare($productCategoryFieldsSql);
    $productCategoryFields->bindParam(":product_category_id", $_GET['id'], PDO::PARAM_INT);
    $productCategoryFields->execute();

    $previousSectionId = -1;
    while ($field = $productCategoryFields->fetch(PDO::FETCH_ASSOC)) {
        if ($previousSectionId != $field['section_id']) {
            $sectionDataSql = "SELECT name, section_id FROM Form_Sections WHERE section_id = :section_id;";
            $sectionData = $pdo->prepare($sectionDataSql);
            $sectionData->bindParam(":section_id", $field['section_id'], PDO::PARAM_INT);
            $sectionData->execute();
            $sectionData = $sectionData->fetch(PDO::FETCH_ASSOC);

            $previousSectionId = $sectionData['section_id'];
            $productCategory['attributes'][] = [
                "id" => $sectionData['section_id'],
                "name" => $sectionData['name'],
                "fields" => array()
            ];
        }
        $productCategory['attributes'][count($productCategory['attributes'])-1]['fields'][] = $field;
    }
}

echo json_encode($productCategory);