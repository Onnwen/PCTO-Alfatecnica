<?php

require_once('connessione.php');
require_once("authentication/authentication.php");

if (!$isAuthenticated) {
    http_response_code(401);
    exit();
}

if (!$isUser) {
    http_response_code(403);
    exit();
}

$idCategoria = isset($_GET['idCategoria']) ? $_GET['idCategoria'] : null;

if (is_null($idCategoria)) {
    http_response_code(400);
    exit();
}

$selectFieldsNamesSql = "SELECT name AS field_name, field_id FROM Product_Fields WHERE Product_Fields.product_category_id = $idCategoria;";
$fieldsNames = array();
$res = $pdo->prepare($selectFieldsNamesSql);
$res->execute();
while ($field = $res->fetch(PDO::FETCH_ASSOC)) {
    array_push($fieldsNames, $field);
}

$json = json_encode($fieldsNames);
echo $json;

exit();
