<?php
require_once('connessione.php');

$idProduct= isset($_POST['idProduct']) ? $_POST['idProduct'] : 0;

if($idProduct != 0){
    $selectFieldsNamesSql = "SELECT Sold_Products.sold_product_id AS idProduct, Product_Category.name as category 
                                FROM Sold_Products INNER JOIN Product_Category ON Sold_Products.product_category_id = Product_Category.product_category_id
                                WHERE Sold_Products.sold_product_id = $idProduct";
    $toReturn = array();
    $res = $pdo->prepare($selectFieldsNamesSql);
    $res->execute();
    while ($field = $res->fetch(PDO::FETCH_ASSOC)) {
        array_push($toReturn, $field);
    }
    $json = json_encode($toReturn);
    echo $json;
}
?>