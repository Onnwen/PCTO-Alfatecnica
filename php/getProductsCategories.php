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

$query = "SELECT name as productCategoryName, product_category_id as idCategory FROM Product_Category order by product_category_id ASC";
$categoriesName = array();
$res = $pdo->prepare($query);
$res->execute();
while ($category = $res->fetch(PDO::FETCH_ASSOC)) {
    array_push($categoriesName, $category);
}
if (count($categoriesName) != 0){
    $json = json_encode($categoriesName);
    echo $json;
}
exit();

