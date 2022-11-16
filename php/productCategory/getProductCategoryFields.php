<?php
require_once('../connessione.php');
$query = "SELECT Product_Category.name as product_category_name, Fields_Names.field_id, Fields_Names.name as field_name 
FROM Product_Category
         INNER JOIN (SELECT field_id, name, product_category_id FROM Product_Fields) AS Fields_Names
                    ON Product_Category.product_category_id = Fields_Names.product_category_id
WHERE Product_Category.product_category_id = :product_category_id;
";

$res = $pdo->prepare($query);
$res->bindParam(":product_category_id", $_GET['id'], PDO::PARAM_INT);
$res->execute();

$fieldsNames = array();
while ($fieldName = $res->fetch(PDO::FETCH_ASSOC)) {
    $fieldsNames[] = $fieldName;
}
echo json_encode($fieldsNames);
?>