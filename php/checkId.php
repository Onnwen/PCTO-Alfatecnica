<?php
require_once('connessione.php');

$count = 0;
$selectId = "SELECT sold_product_id FROM Sold_Products ORDER BY sold_product_id DESC LIMIT 1";
$res = $pdo->query($selectId);
if($res){
  while($id = $res->fetch(PDO::FETCH_ASSOC)){
    $count = $id['sold_product_id'] + 1;
  }
} else {
  $count = 1;
}
echo $count;

 ?>
