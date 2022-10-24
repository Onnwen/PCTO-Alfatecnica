<?php
require_once('connessione.php');

$idCategoria= isset($_POST['idCategoria']) ? $_POST['idCategoria'] : 0;
$idCompagnia= isset($_POST['idCompagnia']) ? $_POST['idCompagnia'] : 0;

if($idCategoria != 0 && $idCompagnia != 0){
    $selectFieldsNamesSql = "SELECT Product_Category.name as categoryName, icon_image_path as productIcon, Companies.planimetry_image_width as w, Companies.planimetry_image_height as h FROM Product_Category INNER JOIN Companies WHERE Product_Category.product_category_id = $idCategoria and Companies.id= $idCompagnia;";
    $fieldsNames = array();
    $res = $pdo->prepare($selectFieldsNamesSql);
    $res->execute();
    while ($field = $res->fetch(PDO::FETCH_ASSOC)) {
        array_push($fieldsNames, $field);
    }
    $json = json_encode($fieldsNames);
    echo $json;
}
?>