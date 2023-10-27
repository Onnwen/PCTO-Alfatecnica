<?php
require_once('connection/connection.php');

$idProd = isset($_POST['id']) ? $_POST['id'] : 0;
if(!$idProd == 0){
    $query = "SELECT path_logo, planimetry_image_url FROM Companies WHERE id = :id";
    $res = $pdo->prepare($query);
    $res->bindParam(":id", $idProd, PDO::PARAM_INT);
    $res->execute();
    $row = $res->fetch(PDO::FETCH_ASSOC);
    $path_logo = "../".$row['path_logo'];
    $planimetry_image_url = "../". $row['planimetry_image_url'];
    if($path_logo != '' && $path_logo != null){
        unlink($path_logo);
    }
    if($planimetry_image_url != '' && $planimetry_image_url != null){
        unlink($planimetry_image_url);
    }

    $delete = "DELETE FROM Companies WHERE id = :id";
    $res = $pdo->prepare($delete);
    $res->bindParam(":id", $idProd, PDO::PARAM_INT);
    $res->execute();
    if($res)
        echo 1;
    else
        echo 0;
}
