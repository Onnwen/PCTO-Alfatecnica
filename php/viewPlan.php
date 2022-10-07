<?php
require_once('connessione.php');

$idAnag = isset($_POST['idAnag']) ? $_POST['idAnag'] : 0;
if(!$idAnag == 0){
  $select = "SELECT prodotti.id, prodotti_img.nome_prodotto, prodotti.pos_x, prodotti.pos_y, prodotti_img.path_img AS pathProd, planimetrie.path_img AS pathSfondo, planimetrie.width, planimetrie.height
             FROM app JOIN planimetrie JOIN prodotti_img JOIN prodotti JOIN anagrafica
             ON planimetrie.id = app.idPlanimetria
             AND app.idAnagrafica = anagrafica.id
             AND app.idProdotto = prodotti.id
             AND prodotti.idProdImg = prodotti_img.id
             WHERE app.idAnagrafica = " . $idAnag;
  $result = $pdo->query($select);
  $arr = array();
  $i = 0;
  if($result){
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
      $arr[$i] = array(
        'id_prod' => $row['id'],
        'nome_prod' => $row['nome_prodotto'],
        'posX' => $row['pos_x'],
        'posY' => $row['pos_y'],
        'pathProd' => $row['pathProd'],
        'pathSfondo' => $row['pathSfondo'],
        'w' => $row['width'],
        'h' => $row['height']
      );
      $i++;
    }
  } else {
    $arr = [
      'dati' => 'Nessun dato trovato',
      'msg' => 'Planimetria ancora da configurare'
    ];
  }
  $json = json_encode($arr);
  echo $json;
}
 ?>
