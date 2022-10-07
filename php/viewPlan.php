<?php
require_once('connessione.php');

$idAnag = isset($_POST['idAnag']) ? $_POST['idAnag'] : 0;
if (!$idAnag == 0) {
    $select = "SELECT Sold_Products.sold_product_id AS id, Product_Category.name AS nome_prodotto, Sold_Products.x AS pos_x, Sold_Products.y AS pos_y,Companies.planimetry_image_url AS pathSfondo, Product_Category.icon_image_path AS pathProd, Companies.planimetry_image_width AS width,Companies.planimetry_image_height AS height
              FROM Sold_Products
              INNER JOIN Companies on Sold_Products.company_id = Companies.id
              INNER JOIN Product_Category on Product_Category.product_category_id = Sold_Products.product_category_id
              WHERE Companies.id = " . $idAnag;
    $result = $pdo->query($select);
    $arr = array();
    $i = 0;
    if ($result) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $arr[$i] = array(
                'id_prod' => $row['id'],
                'nome_prod' => $row['nome_prodotto'],
                'posX' => $row['pos_x'],
                'posY' => $row['pos_y'],
                'pathProd' => $row['pathProd'],
                'pathSfondo' => $row['pathSfondo'],
                'w' => $row['width'],
                'h' => $row['height']
            );
            $i++;
        }
    } else {
        $arr = [
            'dati' => 'Nessun dato trovato',
            'msg' => 'Planimetria ancora da configurare'
        ];
    }
    $json = json_encode($arr);
    echo $json;
}
?>
