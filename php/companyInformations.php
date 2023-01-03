<?php
require_once("connessione.php");
require_once("authentication/authentication.php");

if (!$isAuthenticated) {
    http_response_code(401);
    exit();
}

if (!$isUser) {
    http_response_code(403);
    exit();
}

$companyId = isset($_GET['id_ana']) ? $_GET['id_ana'] : null;

if (is_null($companyId)) {
    http_response_code(400);
    exit();
}

$selectQuery = "SELECT name, site, address, CAP, city, province, phoneNumber1, emailAddress1, personalReference, phoneNumber2, cellPhoneNumber, emailAddress2, companyNotes, clientNotes
FROM Companies WHERE id = :id";
$pre = $pdo->prepare($selectQuery);
$pre->bindParam(':id', $companyId, PDO::PARAM_INT);
$pre->execute();
$row = $pre->fetch(PDO::FETCH_ASSOC);
$companyArray = [
    'name' => $row['name'],
    'site' => $row['site'],
    'address' => $row['address'],
    'CAP' => $row['CAP'],
    'city' => $row['city'],
    'province' => $row['province'],
    'phoneNumber' => $row['phoneNumber1'],
    'emailAddress' => $row['emailAddress1'],
    'personalReference' => $row['personalReference'],
    'phoneNumber2' => $row['phoneNumber2'],
    'cellPhoneNumber' => $row['cellPhoneNumber'],
    'emailAddress2' => $row['emailAddress2'],
    'companyNotes' => $row['companyNotes'],
    'clientNotes' => $row['clientNotes']
];
echo json_encode($companyArray);
exit();