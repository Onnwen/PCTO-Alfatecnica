<?php
require_once('connessione.php');

$idCategory = isset($_POST['idCategory']) ? $_POST['idCategory'] : 0;
$idCompany = isset($_POST['idCompany']) ? $_POST['idCompany'] : 0;

if(!$idCategory == 0 && !$idCompany==0){
    $deleteRevisions = "DELETE FROM Revisions WHERE product_category_id = $idCategory AND company_id = ".$idCompany." ";
    $res = $pdo->prepare($deleteRevisions);
    $res->execute();
    if($res)
        echo 1;
    else
        echo 0;

    $select = "SELECT sold_product_id FROM Sold_Products WHERE product_category_id = $idCategory AND company_id = ".$idCompany." ";
    $res = $pdo->prepare($select);
    $res->execute();
    $soldProductsToDelete = array();
    while ($products = $res->fetch(PDO::FETCH_ASSOC)) {
        array_push($soldProductsToDelete, $products);
    }
    if($soldProductsToDelete)
        foreach($soldProductsToDelete as $result){
            $delete = "DELETE FROM Product_Data WHERE sold_product_id = ".$result['sold_product_id']." ";
            $res = $pdo->prepare($delete);
            $res->execute();
            if($res)
                echo 1;
            else
                echo 0;
        }
    else
        echo 0;

    $delete = "DELETE FROM Sold_Products WHERE product_category_id = $idCategory AND company_id = ".$idCompany." ";
    $res = $pdo->prepare($delete);
    $res->execute();
    if($res)
        echo 1;
    else
        echo 0;

}
?>
