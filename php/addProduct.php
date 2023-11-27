<?php
require_once('connection/connection.php');

$companyId = $_POST["company_id"];
$productCategoryId = $_POST["product_category_id"];
$x = $_POST["cX"];
$y = $_POST["cY"];

$date = $_POST["date"];

$productFieldsSql = "SELECT Product_Fields.field_id, Product_Fields.name FROM Product_Fields WHERE Product_Fields.product_category_id = :id;";
$productFieldsQuery = $pdo->prepare($productFieldsSql);
$productFieldsQuery->bindParam(':id', $productCategoryId, PDO::PARAM_INT);
$productFieldsQuery->execute();

//change string of date to date format
$date = date("Y-m-d H:i:s" , strtotime($date));

$toReview = true;
$queryRevision = "SELECT * FROM Revisions WHERE Revisions.product_category_id = " . $productCategoryId . " AND Revisions.company_id = " . $companyId . " AND Revisions.data = '" . $date . "' ;";
$pre = $pdo->prepare($queryRevision);
$pre->execute();
$check = $pre->fetch(PDO::FETCH_ASSOC);
if ($check) {
    $toReview = false;
}

try {
  $pdo->beginTransaction();
  $pdo->query("INSERT INTO Sold_Products(`company_id`, `product_category_id`, `x`, `y`) VALUES (" . $companyId . ", " . $productCategoryId . ", " . $x . ", " . $y . ");");
  while ($row = $productFieldsQuery->fetch(PDO::FETCH_ASSOC)) {
    $productFields[] = array(
        "field_id" => $row["field_id"],
        "field_name" => $row["name"]
    );
    $pdo->query("INSERT INTO Product_Data(`sold_product_id`, `field_id`, `value`) VALUES (LAST_INSERT_ID(), '" . $row["field_id"] . "', '" . $_POST[$row["field_id"]] . "');");
  }
  if ($toReview) {
      $pdo->query("INSERT INTO Revisions(`product_category_id`, `company_id`, `data`) VALUES (" . $productCategoryId . ", " . $companyId . ", '". $date . "');");
  }
  $pdo->commit();
} catch (Exception $e) {
  echo $e;
  http_response_code(400);
  exit;
}
