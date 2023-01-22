<?php
    require_once('connessione.php');
    $getCompanies = "SELECT * FROM Companies";
    $companies = array();
    $res = $pdo->prepare($getCompanies);
    $res->execute();
    while ($company = $res->fetch(PDO::FETCH_ASSOC)) {
        array_push($companies, $company);
    }
    $json = json_encode($companies);
    echo $json;
?>