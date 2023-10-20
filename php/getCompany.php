<?php
require_once('connection/connection.php');

$query = "SELECT id, name, site, path_logo FROM Companies";
$risultato = $pdo->query($query);
$array = array();
$i = 0;
if($risultato){
  while($row = $risultato->fetch(PDO::FETCH_ASSOC)){
    $array[$i] = array(
      "id" => $row["id"],
      "nome" => $row["name"],
      "sede" => $row["site"],
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
