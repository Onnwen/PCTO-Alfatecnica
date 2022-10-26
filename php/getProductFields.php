<?php
require_once('connessione.php');

$productFieldsSql = "SELECT Product_Fields.field_id, Product_Fields.name FROM Product_Fields WHERE Product_Fields.product_category_id = :id;";
$pre = $pdo->prepare($productFieldsSql);
$pre->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
$pre->execute();

$productFields = array();
while($row = $pre->fetch(PDO::FETCH_ASSOC)){
    $productFields[] = array(
        "field_id" => $row["field_id"],
        "field_name" => $row["name"]
    );
}
echo json_encode($productFields);
