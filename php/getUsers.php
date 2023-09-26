<?php
require_once('connessione.php');
require_once("authentication/authentication.php");

if (!$isAuthenticated) {
    http_response_code(401);
    exit();
}

$userNameSurname = isset($_POST['userNameSurname']) ? $_POST['userNameSurname'] : null;
$company = isset($_POST['company']) ? $_POST['company'] : null;

$select = "SELECT Users.user_id as id, first_name, last_name, email, role, active, activedByCompany, Companies.name AS company
    FROM Users
    LEFT JOIN User_Company ON User_Company.user_id = Users.user_id
    LEFT JOIN Companies ON Companies.id = User_Company.company_id ";

if (is_null($userNameSurname) && is_null($company)) {
    $select .= "WHERE first_name LIKE '%$userNameSurname%' OR last_name LIKE '%$userNameSurname%' AND Companies.name LIKE '%$company%'";
} else if (is_null($userNameSurname)) {
    $select .= "WHERE first_name LIKE '%$userNameSurname%' OR last_name LIKE '%$userNameSurname%'";
} else if (is_null($company)) {
    $select .= "WHERE Companies.name LIKE '%$company%'";
}

$pre = $pdo->prepare($select);
$pre->execute();
$check = $pre->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($check);

