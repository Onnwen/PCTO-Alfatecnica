<?php
session_start();
require_once('connection/connection.php');

$id = isset($_POST['id']) ? $_POST['id'] : ''; # TODO: valida che l'id deve esserci
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
/*
 * #FIXME inserire i nuovi file ed eliminare i vecchi sovrascirverli con i nuovi
$planimetry_image = $_FILES["planimetry_image"];
$logo = $_FILES["logo"];

$target_dir_logo = "img/loghi/";
$target_dir_planimetry = "img/planimetrie/";

$target_file_logo = $target_dir_logo . $name . "." . strtolower(pathinfo($logo["name"], PATHINFO_EXTENSION)); #FIXME: Controlla che il file non esista di già!
$target_file_planimetry = $target_dir_planimetry . $name  . "." . strtolower(pathinfo($planimetry_image["name"], PATHINFO_EXTENSION)); #FIXME: Controlla che il file non esista di già!

$image_data = getimagesize($planimetry_image["tmp_name"]);

$planimetry_image_width = $image_data[0];
$planimetry_image_height = $image_data[1];
*/
$queryName = "SELECT COUNT(*) as numbersOfNames FROM Companies WHERE name = :name";
$pre = $pdo->prepare($queryName);
$pre->bindParam(':name', $name, PDO::PARAM_STR);
$pre->execute();
$check = $pre->fetch(PDO::FETCH_ASSOC);
if($check['numbersOfNames']!==0){
    echo "Name already exists";
    exit;
}

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


try {
    $pre->execute();
    echo '1';
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
exit;
