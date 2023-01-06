<?php
    require_once('connessione.php');

    $userNameSurname = isset($_POST['userNameSurname']) ? $_POST['userNameSurname'] : '';
    $company = isset($_POST['company']) ? $_POST['company'] : '';

    if($userNameSurname !== '' && $company !== ''){
        $select = "SELECT Users.user_id, first_name, last_name, email, role, active, activedByCompany, Companies.name AS company
                   FROM Users
                        INNER JOIN User_Company ON User_Company.user_id = Users.user_id
                        INNER JOIN Companies ON Companies.id = User_Company.company_id
                   WHERE first_name LIKE '%$userNameSurname%' OR last_name LIKE '%$userNameSurname%' AND Companies.name = '%$company%'";
        $pre = $pdo->prepare($select);
        $pre->execute();
        $check = $pre->fetchAll(PDO::FETCH_ASSOC);
        if(!$check){
            echo "error";
            exit;
        } else {
            echo json_encode($check);
            exit;
        }
    } else if ($userNameSurname !== ''){
        $select = "SELECT Users.user_id, first_name, last_name, email, role, active, activedByCompany, Companies.name AS company
                   FROM Users
                        INNER JOIN User_Company ON User_Company.user_id = Users.user_id
                        INNER JOIN Companies ON Companies.id = User_Company.company_id
                   WHERE first_name LIKE '%$userNameSurname%' OR last_name LIKE '%$userNameSurname%'";
        $pre = $pdo->prepare($select);
        $pre->execute();
        $check = $pre->fetchAll(PDO::FETCH_ASSOC);
        if(!$check){
            echo "error";
            exit;
        } else {
            echo json_encode($check);
            exit;
        }
    } else if ($company !== ''){
        $select = "SELECT Users.user_id, first_name, last_name, email, role, active, activedByCompany, Companies.name AS company
                   FROM Users
                        INNER JOIN User_Company ON User_Company.user_id = Users.user_id
                        INNER JOIN Companies ON Companies.id = User_Company.company_id
                   WHERE Companies.name = '%$company%'";
        $pre = $pdo->prepare($select);
        $pre->execute();
        $check = $pre->fetchAll(PDO::FETCH_ASSOC);
        if(!$check){
            echo "error";
            exit;
        } else {
            echo json_encode($check);
            exit;
        }
    } else {
        $select = "SELECT Users.user_id, name, surname, email, role, active, activedByCompany, company
                   FROM Users
                        INNER JOIN User_Company ON User_Company.user_id = Users.user_id";
        $pre = $pdo->prepare($select);
        $pre->bindParam(':company', $company, PDO::PARAM_STR);
        $pre->execute();
        $check = $pre->fetchAll(PDO::FETCH_ASSOC);
        if(!$check){
            echo "error";
            exit;
        } else {
            echo json_encode($check);
            exit;
        }
    }
?>