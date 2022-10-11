<?php
    require_once('connessione.php');

    $idAnag = isset($_POST['idAnag']) ? $_POST['idAnag'] : 0;
    if (!$idAnag == 0) {
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
        //$pre->bindParam(':product_category_id', $productCategoryID, PDO::PARAM_INT);
        //$pre->bindParam(':name', $productCategoryName, PDO::PARAM_INT);
        $pre->execute();
        $categoryOfCompany = array();
        $i = 0;
        while ($field = $pre->fetch(PDO::FETCH_ASSOC)) {
            $categoryOfCompany[$i] = [
                'idCategoria' => $field['IdCategoria'],
                'nomeCategoria' => $field['nome'],
                'dataUltimaManutenzione' => $field['data'],
                'quantita' => $field['quantita']
            ];
            $i++;
        }
    }
    $json = json_encode($categoryOfCompany);
    echo $json;
?>