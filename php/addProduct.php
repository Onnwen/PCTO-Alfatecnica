<?php
require_once('connessione.php');

$posX = isset($_POST['posX']) ? $_POST['posX'] : '';
$posY = isset($_POST['posY']) ? $_POST['posY'] : '';
$idProdotto = isset($_POST['idProdotto']) ? $_POST['idProdotto'] : 0;
$id = isset($_POST['id']) ? $_POST['id'] : 0;
$width = isset($_POST['w']) ? $_POST['w'] : 0;
$height = isset($_POST['h']) ? $_POST['h'] : 0;
$idPlan = isset($_POST['idPlan']) ? $_POST['idPlan'] : 0;

if ($posX != '' || $posY != '' || $idProdotto != 0 || $id != 0) {
  $insProd = "INSERT INTO prodotti(id, pos_x, pos_y, idProdImg)
             VALUES('" . $id . "','" . $posX . "', '" . $posY . "', '" . $idProdotto . "')";
  $result = $pdo->query($insProd);
  if ($result)
    echo 1;
  else
    echo 0;
}
if($width != 0 || $height != 0 ){
  $insPlan = "UPDATE planimetrie SET width = '" . $width . "', height = '" . $height . "' WHERE id = " . $idPlan;
  $result2 = $pdo->query($insPlan);
  if($result2)
    echo 1;
  else
    echo 0;
}
 ?>
