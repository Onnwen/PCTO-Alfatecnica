<?php
require_once('connessione.php');

$nomeAzienda = $_POST['nome_azienda'];
$sede = $_POST['sede'];
$data = $_POST['data'];

$query = "SELECT tabella.id, tabella.name, tabella.site, tabella.path_logo FROM (select Companies.id, Companies.name, Companies.site, Companies.path_logo, max(date(Revisions.data)) as 'lastRevisionDate' from Revisions right join Companies on Companies.id = Revisions.company_id group by Companies.id) as tabella WHERE name LIKE CONCAT('%', :name, '%') AND site LIKE CONCAT('%', :site, '%') AND (:data = '' or :data2 = tabella.lastRevisionDate)";

$pre = $pdo->prepare($query);

$pre->bindParam(":name", $nomeAzienda, PDO::PARAM_STR);
$pre->bindParam(":site", $sede, PDO::PARAM_STR);
$pre->bindParam(":data", $data, PDO::PARAM_STR);
$pre->bindParam(":data2", $data, PDO::PARAM_STR);

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
