<?php
require_once('connessione.php');

$idProd = isset($_POST['id']) ? $_POST['id'] : 0;
$newPosX = isset($_POST['newPosX']) ? $_POST['newPosX'] : 0;
$newPosY = isset($_POST['newPosY']) ? $_POST['newPosY'] : 0;

if($idProd != 0 && $newPosX != 0 && $newPosY != 0){
  $updProd = "UPDATE prodotti SET pos_x = '" . $newPosX . "', pos_y = '" . $newPosY . "' WHERE id = " . $idProd;
  $res = $pdo->query($updProd);
  if($res)
    echo 1;
  else
    echo 0;
}

 ?>
