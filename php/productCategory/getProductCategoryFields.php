<?php
require_once('../connessione.php');
$productCategoryDataSql = "SELECT name as product_category_name, visualization_type, product_category_id FROM Product_Category WHERE product_category_id = :product_category_id;";
$productCategoryData = $pdo->prepare($productCategoryDataSql);
$productCategoryData->bindParam(":product_category_id", $_GET['id'], PDO::PARAM_INT);
$productCategoryData->execute();

$productCategory = $productCategoryData->fetch(PDO::FETCH_ASSOC);

if ($productCategory['visualization_type'] == 0) {
    $productCategoryFieldsSql = "SELECT field_id as id, name FROM Product_Fields WHERE product_category_id = :product_category_id;";
    $productCategoryFields = $pdo->prepare($productCategoryFieldsSql);
    $productCategoryFields->bindParam(":product_category_id", $_GET['id'], PDO::PARAM_INT);
    $productCategoryFields->execute();

    $productCategory['fields'] = array();
    while ($field = $productCategoryFields->fetch(PDO::FETCH_ASSOC)) {
        $productCategory['fields'][] = $field;
    }
} else {
    echo "Not supported";
}

echo json_encode($productCategory);