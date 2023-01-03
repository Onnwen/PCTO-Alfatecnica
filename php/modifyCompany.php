<?php
# FIXME: Usare PUT invece che POST!

require_once('connessione.php');
require_once("authentication/authentication.php");

if (!$isAuthenticated) {
    http_response_code(401);
    exit();
}

if (!$isTechnician) {
    http_response_code(403);
    exit();
}

$id = isset($_POST['id']) ? $_POST['id'] : null;
$name = isset($_POST['name']) ? $_POST['name'] : null;
$site = isset($_POST['site']) ? $_POST['site'] : null;
$address = isset($_POST['address']) ? $_POST['address'] : null;
$CAP = isset($_POST['CAP']) ? $_POST['CAP'] : null;
$city = isset($_POST['city']) ? $_POST['city'] : null;
$province = isset($_POST['province']) ? $_POST['province'] : null;
$phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';
$emailAddress = isset($_POST['emailAddress']) ? $_POST['emailAddress'] : '';
$personalReference = isset($_POST['personalReference']) ? $_POST['personalReference'] : '';
$phoneNumber2 = isset($_POST['phoneNumber2']) ? $_POST['phoneNumber2'] : '';
$cellPhoneNumber = isset($_POST['cellPhoneNumber']) ? $_POST['cellPhoneNumber'] : '';
$emailAddress2 = isset($_POST['emailAddress2']) ? $_POST['emailAddress2'] : '';
$companyNotes = isset($_POST['companyNotes']) ? $_POST['companyNotes'] : '';
$clientNotes = isset($_POST['clientNotes']) ? $_POST['clientNotes'] : '';

# Mi sono basato sui campi non annullabili nel database
if (is_null($id) || is_null($name) || is_null($site) || is_null($address) || is_null($CAP) || is_null($city) || is_null($province)) {
    http_response_code(400);
    exit();
}

# TODO: Implementare modifica delle immagini

$Query = "UPDATE Companies SET name = :name, site = :site, address = :address, CAP = :CAP, city = :city, province = :province, phoneNumber1 = :phoneNumber, emailAddress1 = :emailAddress, personalReference = :personalReference, phoneNumber2 = :phoneNumber2, cellPhoneNumber = :cellPhoneNumber, emailAddress2 = :emailAddress2, companyNotes = :companyNotes, clientNotes = :clientNotes WHERE id = :id";
try {
    $pre = $pdo->prepare($Query);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

$pre->bindParam(':id', $id, PDO::PARAM_INT);
$pre->bindParam(':name', $name, PDO::PARAM_STR);
$pre->bindParam(':site', $site, PDO::PARAM_STR);
$pre->bindParam(':address', $address, PDO::PARAM_STR);
$pre->bindParam(':CAP', $CAP, PDO::PARAM_INT);
$pre->bindParam(':city', $city, PDO::PARAM_STR);
$pre->bindParam(':province', $province, PDO::PARAM_STR);
$pre->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
$pre->bindParam(':emailAddress', $emailAddress, PDO::PARAM_STR);
$pre->bindParam(':personalReference', $personalReference, PDO::PARAM_STR);
$pre->bindParam(':phoneNumber2', $phoneNumber2, PDO::PARAM_STR);
$pre->bindParam(':cellPhoneNumber', $cellPhoneNumber, PDO::PARAM_STR);
$pre->bindParam(':emailAddress2', $emailAddress2, PDO::PARAM_STR);
$pre->bindParam(':companyNotes', $companyNotes, PDO::PARAM_STR);
$pre->bindParam(':clientNotes', $clientNotes, PDO::PARAM_STR);

$pre->execute();

exit();
