<?php
require_once('connessione.php');

$count = 0;
$selectId = "SELECT id FROM prodotti ORDER BY id DESC LIMIT 1";
$res = $pdo->query($selectId);
if($res){
  while($id = $res->fetch(PDO::FETCH_ASSOC)){
    $count = $id['id'] + 1;
  }
} else {
  $count = 1;
}
echo $count;

 ?>
