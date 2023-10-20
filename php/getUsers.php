<?php
    require_once('connection/connection.php');

    $userNameSurname = isset($_POST['userNameSurname']) ? $_POST['userNameSurname'] : '';
    $company = isset($_POST['company']) ? $_POST['company'] : '';

    if($userNameSurname !== '' && $company !== ''){
        $select = "SELECT Users.user_id as id, first_name, last_name, email, role, active, activedByCompany, Companies.name AS company
                   FROM Users
                        LEFT JOIN User_Company ON User_Company.user_id = Users.user_id
                        LEFT JOIN Companies ON Companies.id = User_Company.company_id
                   WHERE first_name LIKE '%$userNameSurname%' OR last_name LIKE '%$userNameSurname%' AND Companies.name LIKE '%$company%'";
        $pre = $pdo->prepare($select);
        $pre->execute();
        $check = $pre->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($check);
        exit;
    } else if ($userNameSurname !== ''){
        $select = "SELECT Users.user_id, first_name, last_name, email, role, active, activedByCompany, Companies.name AS company
                   FROM Users
                        LEFT JOIN User_Company ON User_Company.user_id = Users.user_id
                        LEFT JOIN Companies ON Companies.id = User_Company.company_id
                   WHERE first_name LIKE '%$userNameSurname%' OR last_name LIKE '%$userNameSurname%'";
        $pre = $pdo->prepare($select);
        $pre->execute();
        $check = $pre->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($check);
        exit;
    } else if ($company !== ''){
        $select = "SELECT Users.user_id, first_name, last_name, email, role, active, activedByCompany, Companies.name AS company
                   FROM Users
                        INNER JOIN User_Company ON User_Company.user_id = Users.user_id
                        INNER JOIN Companies ON Companies.id = User_Company.company_id
                   WHERE Companies.name LIKE '%$company%'";
        $pre = $pdo->prepare($select);
        $pre->execute();
        $check = $pre->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($check);
        exit;
    } else {
        $select = "SELECT Users.user_id, first_name, last_name, email, role, active, activedByCompany, Companies.name AS company
                   FROM Users
                        LEFT JOIN User_Company ON User_Company.user_id = Users.user_id
                        LEFT JOIN Companies ON Companies.id = User_Company.company_id";
        $pre = $pdo->prepare($select);
        $pre->execute();
        $check = $pre->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($check);
        exit;
    }
?>
