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
$idCompagnia = isset($_GET['idCompagnia']) ? $_GET['idCompagnia'] : null;

if (is_null($idCategoria) || is_null($idCompagnia)) {
    http_response_code(400);
    exit();
}

$selectFieldsNamesSql = "SELECT Product_Category.name as categoryName, icon_image_path as productIcon, Companies.planimetry_image_width as w, Companies.planimetry_image_height as h FROM Product_Category INNER JOIN Companies WHERE Product_Category.product_category_id = $idCategoria and Companies.id= $idCompagnia;";
$fieldsNames = array();
$res = $pdo->prepare($selectFieldsNamesSql);
$res->execute();
while ($field = $res->fetch(PDO::FETCH_ASSOC)) {
    array_push($fieldsNames, $field);
}
$json = json_encode($fieldsNames);
echo $json;

exit();
?>