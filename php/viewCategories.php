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

$idAnag = isset($_POST['idAnag']) ? $_POST['idAnag'] : null;

if (is_null($idAnag)) {
    http_response_code(400);
    exit();
}

$categoryOfCompanySql = "with aa(col1, col2, col3) as (
                            SELECT DISTINCT Sold_Products.product_category_id, Product_Category.name, max(Revisions.data) as Date
                            from Sold_Products
                                inner join Companies join Product_Category join Revisions
                                    on Sold_Products.product_category_id = Product_Category.product_category_id
                                    AND  Sold_Products.company_id=Companies.id
                                    AND Revisions.company_id = Companies.id
                                    AND Revisions.product_category_id = Product_Category.product_category_id
                            where Sold_Products.company_id= $idAnag
                            group by Sold_Products.product_category_id
                            ),
                                bb(col4, col5) as (
                                SELECT distinct Sold_Products.product_category_id, count(Sold_Products.sold_product_id) as Quantita
                                from Sold_Products
                                    inner join Companies join Product_Category
                                        on Sold_Products.product_category_id = Product_Category.product_category_id
                                        AND  Sold_Products.company_id=Companies.id
                                where Sold_Products.company_id= $idAnag
                                group by Sold_Products.product_category_id
                            )
                        select distinct aa.col1 as IdCategoria, aa.col2 as nome, aa.col3 as data, bb.col5 as quantita
                        from aa , bb
                        where aa.col1=bb.col4;";
$pre = $pdo->prepare($categoryOfCompanySql);
$pre->execute();

$categoryOfCompany = array();

for ($i = 0; $field = $pre->fetch(PDO::FETCH_ASSOC); $i++) {
    $categoryOfCompany[$i] = [
        'idCategoria' => $field['IdCategoria'],
        'nomeCategoria' => $field['nome'],
        'dataUltimaManutenzione' => $field['data'],
        'quantita' => $field['quantita']
    ];
}

$json = json_encode($categoryOfCompany);
echo $json;

exit();
