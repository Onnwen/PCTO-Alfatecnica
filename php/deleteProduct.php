<?php
require_once('connessione.php');

$idProd = isset($_POST['id']) ? $_POST['id'] : 0;
if(!$idProd == 0){

  $delete = "DELETE FROM Product_Data WHERE sold_product_id = :id";
  $res = $pdo->prepare($delete);
  $res->bindParam(":id", $idProd, PDO::PARAM_INT);
  $res->execute();
  if($res)
    echo 1;
  else
    echo 0;

  $delete = "DELETE FROM Sold_Products WHERE sold_product_id = :id";
  $res = $pdo->prepare($delete);
  $res->bindParam(":id", $idProd, PDO::PARAM_INT);
  $res->execute();
  if($res)
    echo 1;
  else
    echo 0;
}
 ?>
