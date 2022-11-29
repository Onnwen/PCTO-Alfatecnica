<?php
require_once('connessione.php');

$idAnag = isset($_POST['idAnag']) ? $_POST['idAnag'] : 0;

if (!$idAnag == 0) {
    $select_planimetry = "SELECT planimetry_image_url, planimetry_image_width, planimetry_image_height FROM Companies WHERE id = " . $idAnag;
    $result_planimetry = $pdo->query($select_planimetry);

    $planimetry_image = "";
    $planimetry_image_width = 0;
    $planimetry_image_height = 0;

    if ($result_planimetry) {
        while ($row = $result_planimetry->fetch(PDO::FETCH_ASSOC)) {
            // FIXME: Diamo per scontato che ci sarà una sola planimetria
            $planimetry_image = $row["planimetry_image_url"];
            $planimetry_image_width = $row["planimetry_image_width"];
            $planimetry_image_height = $row["planimetry_image_height"];
        }
    }


    $select = "SELECT Sold_Products.sold_product_id AS id, Product_Category.name AS nome_prodotto, Product_Category.product_category_id as id_Categoria, Sold_Products.x AS pos_x, Sold_Products.y AS pos_y, Product_Category.icon_image_path AS pathProd, Companies.planimetry_image_width AS width,Companies.planimetry_image_height AS height
              FROM Sold_Products
              INNER JOIN Companies on Sold_Products.company_id = Companies.id
              INNER JOIN Product_Category on Product_Category.product_category_id = Sold_Products.product_category_id
              WHERE Companies.id = " . $idAnag;
    $result = $pdo->query($select);
    $arr = array();
    $i = 0;
    if ($result && $result->count > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $arr[$i] = array(
                'id_prod' => $row['id'],
                'nome_prod' => $row['nome_prodotto'],
                'id_Categoria' => $row['id_Categoria'],
                'posX' => $row['pos_x'],
                'posY' => $row['pos_y'],
                'pathProd' => $row['pathProd'],
                'pathSfondo' => $planimetry_image,
                'w' => $planimetry_image_width,
                'h' => $planimetry_image_height
            );
            $i++;
        }
    } else {
        $arr[0] = array(
            // FIXME: Hack del piffero per accomodare frontend di Storci; si aspetta il link della planimetria nel primo prodotto
            'id_prod' => 0,
            'nome_prod' => "",
            'id_Categoria' => 0,
            'posX' => 0,
            'posY' => 0,
            'pathProd' => "",
            'pathSfondo' => $planimetry_image,
            'w' => $planimetry_image_width,
            'h' => $planimetry_image_height,

            'dati' => 'Nessun dato trovato',
            'msg' => 'Planimetria ancora da configurare'
        );
    }

    $json = json_encode($arr);
    echo $json;
}
?>
