<?php
session_start();
require_once("../connessione.php");

# Ritorna tutte le revisioni attuali ordinate per data di scadenza
$Query = "SELECT Companies.name as CompanyName, Product_Category.name as ProductCategoryName, Tabella.LastRevision, ADD_MONTHS(Tabella.LastRevision, Product_Category.revisionMonthDuration) as Deadline FROM Companies, Product_Category, (SELECT Revisions.product_category_id, Revisions.company_id, MAX(DATE(Revisions.data)) as LastRevision FROM Revisions GROUP BY Revisions.company_id, Revisions.product_category_id) as Tabella WHERE Tabella.product_category_id = Product_Category.product_category_id AND Tabella.company_id = Companies.id ORDER BY Deadline ASC";

$Result = $pdo->query(($Query));

$array = array();

if ($Result) {
    for ($i = 0; $row = $Result->fetch(PDO::FETCH_ASSOC); $i++) {
        $array[$i] = array(
            "CompanyName" => $row["CompanyName"],
            "ProductCategoryName" => $row["ProductCategoryName"],
            "LastRevision" => $row["LastRevision"],
            "Deadline" => $row["Deadline"]
        );
    }
} else {
    $array = [
        "dati" => "Nessuna revisione trovata",
        "err" => "Il database non ha restituito nessuna revisione"
    ];
}

echo (json_encode($array));
