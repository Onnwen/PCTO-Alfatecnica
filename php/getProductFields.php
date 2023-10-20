<?php
require_once('connection/connection.php');

$idCategoria= isset($_POST['idCategoria']) ? $_POST['idCategoria'] : 0;

if($idCategoria != 0){
    $selectFieldsNamesSql = "SELECT name AS field_name, field_id FROM Product_Fields WHERE Product_Fields.product_category_id = $idCategoria;";
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
