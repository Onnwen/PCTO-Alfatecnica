<?php
session_start();
require_once('connessione.php');

$name = isset($_POST['name']) ? $_POST['name'] : '';
$site = isset($_POST['site']) ? $_POST['site'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$CAP = isset($_POST['CAP']) ? $_POST['CAP'] : 0;
$city = isset($_POST['city']) ? $_POST['city'] : '';
$province = isset($_POST['province']) ? $_POST['province'] : '';
$phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';
$emailAddress = isset($_POST['emailAddress']) ? $_POST['emailAddress'] : '';
$personalReference = isset($_POST['personalReference']) ? $_POST['personalReference'] : '';
$phoneNumber2 = isset($_POST['phoneNumber2']) ? $_POST['phoneNumber2'] : '';
$cellPhoneNumber = isset($_POST['cellPhoneNumber']) ? $_POST['cellPhoneNumber'] : '';
$emailAddress2 = isset($_POST['emailAddress2']) ? $_POST['emailAddress2'] : '';
$companyNotes = isset($_POST['companyNotes']) ? $_POST['companyNotes'] : '';
$clientNotes = isset($_POST['clientNotes']) ? $_POST['clientNotes'] : '';

$Query = "INSERT INTO Companies(name, site, path_logo, address, CAP, city, province, phoneNumber1, emailAddress1, personalReference, phoneNumber2, cellPhoneNumber, emailAddress2, companyNotes, clientNotes) 
    VALUES (:name, :site, :path_logo, :address, :CAP, :city, :province, :phoneNumber, :emailAddress, :personalReference, :phoneNumber2, :cellPhoneNumber, :emailAddress2, :companyNotes, :clientNotes)";
try {
    $pre = $pdo->prepare($Query);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

$tmp = "img/loghi/azienda1.png"; # Necessaria causa PHP deficiente

$pre->bindParam(':name', $name, PDO::PARAM_STR);
$pre->bindParam(':site', $site, PDO::PARAM_STR);
$pre->bindParam(":path_logo", $tmp, PDO::PARAM_STR); # TODO: fixare questo
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

exit;
