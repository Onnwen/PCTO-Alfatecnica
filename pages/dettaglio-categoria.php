<?php
header("Access-Control-Allow-Origin: *");

$connection = mysqli_connect('thecouriernv.tplinkdns.com','alfatecnica','$Yne&Fu8hGVqu935rXeJV8Fo5','alfatecnica2');

if(mysqli_connect_errno()) {
    $msg = "Database connection failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " : " . mysqli_connect_errno();
    exit($msg);
}
$productCategoryID = $_GET['product_category_id'];
$companyID = $_GET['company_id'];

$categoryNameSql = "SELECT `name` FROM `Product_Category` WHERE `product_category_id`={$productCategoryID};";
$categoryNameResponse = mysqli_query($connection, $categoryNameSql);
$categoryName = mysqli_fetch_assoc($categoryNameResponse)['name'];

$selectFieldsNamesSql = "SELECT name AS field_name, field_id FROM Product_Fields INNER JOIN Sold_Products ON Sold_Products.sold_product_id = Product_Fields.product_category_id WHERE Product_Fields.product_category_id = {$productCategoryID};";
$fieldsNamesResponse = mysqli_query($connection, $selectFieldsNamesSql);
$fieldsNames = array();
while ($field = mysqli_fetch_assoc($fieldsNamesResponse)) {
    array_push($fieldsNames, $field);
}

$selectDataSql = "SELECT Product_Data.field_id, Product_Data.value, Sold_Products.sold_product_id FROM Sold_Products INNER JOIN Product_Data ON Product_Data.sold_product_id = Sold_Products.sold_product_id WHERE Sold_Products.product_category_id = {$productCategoryID} AND Sold_Products.company_id = {$companyID}  ORDER BY `Sold_Products`.`sold_product_id` ASC, Product_Data.field_id;;";
$selectDataResponse = mysqli_query($connection, $selectDataSql);
$data = array();
while ($dataResponseRow = mysqli_fetch_assoc($selectDataResponse)) {
    array_push($data, $dataResponseRow);
}
$soldProducts = array();
$soldProduct = array();
for ($i = 0; $i < count($data); $i++) {
    if ($i < 1 || $data[$i]['sold_product_id'] == $data[$i-1]['sold_product_id']) {
        array_push($soldProduct, $data[$i]);
    }
    else {
        array_push($soldProducts, $soldProduct);
        $soldProduct = [];
        array_push($soldProduct, $data[$i]);
    }
    if ($i == count($data)-1) {
        array_push($soldProducts, $soldProduct);
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Alfatecnica - Dettaglio Anagrafica</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a href="#"><img src="../img/logo.png" width="55px" height="50px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse header" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Anagrafica</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Revisione</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Prodotti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Utenti</a>
                </li>
                </li>
            </ul>
            <button type="button" class="btn btn-outline-danger">Logout</button>
        </div>
    </div>
</nav>
<!-- Fine -->


<!-- Tabella -->
<div class="container">
    <div class="row">
        <div class="d-flex justify-content-center nome-azienda">
            <div class="row">
                <div class="col-12">
                    <h4><?php echo $categoryName; ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
    </div>
    <div class="row row-tabella">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <?php
                                foreach ($fieldsNames as $fieldName) {
                                    echo "<th scope='col'>{$fieldName['field_name']}</th>";
                                }
                                echo "<th scope='col'>Modifica</th>";
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($soldProducts as $soldProduct) {
                            echo "<tr>";
                            foreach ($soldProduct as $field) {
                                echo "<th scope='col'>{$field['value']}</th>";
                            }
                            echo "<th scope='col'><button type='button' class='btn btn-danger btn-sm'>Cancella</button></th>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Fine -->

<!-- Footer -->
<footer class="py-3 my-4 border-top ">
    <p class="text-center text-muted ">© 2022 Alfatecnica</p>
</footer>
</body>
</html>