<?php
require_once('../connessione.php');

$productCategoryId = isset($_POST['id']) ? $_POST['id'] : 0;
if(!$productCategoryId == 0){
    $delete = "DELETE FROM Product_Category WHERE product_category_id = :id";
    $res = $pdo->prepare($delete);
    $res->bindParam(":id", $productCategoryId, PDO::PARAM_INT);
    $res->execute();
    if($res)
        echo 1;
    else
        echo 0;
}
?>
