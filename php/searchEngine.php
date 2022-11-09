<?php
require_once('connessione.php');

$nomeAzienda = $_POST['nome_azienda'];
$sede = $_POST['sede'];

$query = "SELECT id, name, site, path_logo FROM Companies WHERE name LIKE CONCAT('%', :name, '%') AND site LIKE CONCAT('%', :site, '%')";

$pre = $pdo->prepare($query);

$pre->bindParam(":name", $nomeAzienda, PDO::PARAM_STR);
$pre->bindParam(":site", $sede, PDO::PARAM_STR);
$risultato = $pre->execute();
$array = array();
$i = 0;
if ($risultato) {
    while ($row = $pre->fetch(PDO::FETCH_ASSOC)) {
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
