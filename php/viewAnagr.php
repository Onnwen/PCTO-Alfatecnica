<?php
require_once('connessione.php');

$query = "SELECT id, nome, sede, path_logo FROM anagrafica";
$risultato = $pdo->query($query);
$array = array();
$i = 0;
if($risultato){
  while($row = $risultato->fetch(PDO::FETCH_ASSOC)){
    $array[$i] = array(
      "id" => $row["id"],
      "nome" => $row["nome"],
      "sede" => $row["sede"],
      "path_logo" => $row["path_logo"]
    );
    $i++;
  }
} else {
  $array = [
    "dati" => 'Nessun dato trovato',
    "err" => 'La query non ha restituito nessun dato'
  ];
}
echo json_encode($array);
?>
