<?php
    require_once('connessione.php');

    $userNameSurname = isset($_POST['userNameSurname']) ? $_POST['userNameSurname'] : '';
    $company = isset($_POST['company']) ? $_POST['company'] : '';

    if($userNameSurname !== '' && $company !== ''){
        $select = "SELECT user_id, name, surname, email, role, active, activedByCompany, company
                   FROM Users
                        INNER JOIN User_Company ON User_Company.user_id = Users.user_id
                        INNER JOIN Companies ON Companies.id = User_Company.company_id
                   WHERE first_name LIKE '%'.:userNameSurname.'%' OR last_name LIKE '%'.:userNameSurname.'%' AND Companies.name = '%'.:company.'%'";
        $pre = $pdo->prepare($select);
        $pre->bindParam(':userNameSurname', $userNameSurname, PDO::PARAM_STR);
        $pre->bindParam(':company', $company, PDO::PARAM_STR);
        $pre->execute();
        $check = $pre->fetchAll(PDO::FETCH_ASSOC);
        if(!$check){
            echo 'noUser';
            exit;
        } else {
            echo json_encode($check);
            exit;
        }
    } else if ($userNameSurname !== ''){
        $select = "SELECT user_id, name, surname, email, role, active, activedByCompany, company
                   FROM Users
                   WHERE first_name LIKE '%'.:userNameSurname.'%' OR last_name LIKE '%'.:userNameSurname.'%'";
        $pre = $pdo->prepare($select);
        $pre->bindParam(':userNameSurname', $userNameSurname, PDO::PARAM_STR);
        $pre->execute();
        $check = $pre->fetchAll(PDO::FETCH_ASSOC);
        if(!$check){
            echo 'noUser';
            exit;
        } else {
            echo json_encode($check);
            exit;
        }
    } else if ($company !== ''){
        $select = "SELECT user_id, name, surname, email, role, active, activedByCompany, company
                   FROM Users
                        INNER JOIN User_Company ON User_Company.user_id = Users.user_id
                        INNER JOIN Companies ON Companies.id = User_Company.company_id
                   WHERE Companies.name = '%'.:company.'%'";
        $pre = $pdo->prepare($select);
        $pre->bindParam(':company', $company, PDO::PARAM_STR);
        $pre->execute();
        $check = $pre->fetchAll(PDO::FETCH_ASSOC);
        if(!$check){
            echo 'noUser';
            exit;
        } else {
            echo json_encode($check);
            exit;
        }
    } else {
        echo 'noUser';
        exit;
    }
?>