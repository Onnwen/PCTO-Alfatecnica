<?php
require_once('connessione.php');

$idProd = isset($_POST['id']) ? $_POST['id'] : 0;
if(!$idProd == 0){
  $delete = "DELETE FROM prodotti WHERE id = " . $idProd;
  $result = $pdo->query($delete);
  if($result)
    echo 1;
  else
    echo 0;
}
 ?>
