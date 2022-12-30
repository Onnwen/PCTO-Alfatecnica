<?php
require_once('connessione.php');

$idAzienda= $_POST['idCategoria'];
if(isset($idAzienda) && $idAzienda != 0 && $idAzienda != null){
    $selectFieldsNamesSql = "SELECT Users.user_id,email,first_name, last_name, role,active,activedByCompany,User_Company.company_id
                                FROM Users
                                   INNER JOIN User_Company ON User_Company.user_id = Users.user_id
                             WHERE company_id = $idAzienda;";
    $users = array();
    $res = $pdo->prepare($selectFieldsNamesSql);
    $res->execute();
    while ($user = $res->fetch(PDO::FETCH_ASSOC)) {
        array_push($users, $user);
    }
    $json = json_encode($users);
    echo $json;
} else {
    $selectFieldsNamesSql = "SELECT Users.user_id,email,first_name, last_name, role,active,activedByCompany,User_Company.company_id
                                FROM Users
                                INNER JOIN User_Company ON User_Company.user_id = Users.user_id;";
    $users = array();
    $res = $pdo->prepare($selectFieldsNamesSql);
    $res->execute();
    while ($user = $res->fetch(PDO::FETCH_ASSOC)) {
        array_push($users, $user);
    }
    $json = json_encode($users);
    echo $json;
}
?>