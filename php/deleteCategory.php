<?php
require_once('connessione.php');

$idCategory = isset($_POST['idCategory']) ? $_POST['idCategory'] : 0;
$idCompany = isset($_POST['idCompany']) ? $_POST['idCompany'] : 0;

if(!$idCategory == 0 && !$idCompany==0){
    $deleteRevisions = "DELETE FROM Revisions WHERE product_category_id = :id AND company_id = :idCompany";

    $res = $pdo->prepare($deleteRevisions);
    $res->bindParam(":id", $idCategory, PDO::PARAM_INT);
    $res->bindParam(":idCompany", $idCompany, PDO::PARAM_INT);
    $res->execute();
    if($res)
        echo 1;
    else
        echo 0;

    $delete = "DELETE FROM Sold_Products WHERE product_category_id = :id AND company_id = :idCompany";
    $res = $pdo->prepare($delete);
    $res->bindParam(":id", $idCategory, PDO::PARAM_INT);
    $res->bindParam(":idCompany", $idCompany, PDO::PARAM_INT);
    $res->execute();
    if($res)
        echo 1;
    else
        echo 0;

}
?>
