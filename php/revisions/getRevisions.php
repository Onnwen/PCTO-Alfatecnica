<?php
session_start();
require_once("../connection/connection.php");

# Ritorna tutte le revisioni attuali ordinate per data di scadenza
$Query = "SELECT Companies.id as CompanyID, Companies.name as CompanyName, Product_Category.product_category_id as ProductCategoryID, Product_Category.name as ProductCategoryName, Tabella.LastRevision, DATE_ADD(Tabella.LastRevision, INTERVAL Product_Category.revisionMonthDuration MONTH) as Deadline FROM Companies, Product_Category, (SELECT Revisions.product_category_id, Revisions.company_id, MAX(DATE(Revisions.data)) as LastRevision FROM Revisions GROUP BY Revisions.company_id, Revisions.product_category_id) as Tabella WHERE Tabella.product_category_id = Product_Category.product_category_id AND Tabella.company_id = Companies.id ORDER BY Deadline ASC";

$Result = $pdo->query(($Query));

$array = array();

if ($Result) {
    for ($i = 0; $row = $Result->fetch(PDO::FETCH_ASSOC); $i++) {
        $array[$i] = array(
            "CompanyName" => $row["CompanyName"],
            "CompanyID" => $row["CompanyID"],
            "ProductCategoryName" => $row["ProductCategoryName"],
            "ProductCategoryID" => $row["ProductCategoryID"],
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
