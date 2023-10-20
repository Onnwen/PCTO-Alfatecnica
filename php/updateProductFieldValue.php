<?php
require_once('connection/connection.php');

$productId = $_POST['product_id'];
$fieldId = $_POST['field_id'];
$newValue = $_POST['value'];

$updProd = "UPDATE Product_Data SET Product_Data.value = '".$newValue."' WHERE Product_Data.sold_product_id = '".$productId."' AND Product_Data.field_id = '".$fieldId."'";
$res = $pdo->query($updProd);
if ($res)
    echo 1;
else
    echo 0;


