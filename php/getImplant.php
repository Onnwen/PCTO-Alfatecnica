<?php
require_once('connection/connection.php');
$product_category_id = $_POST['product_category_id'] ?? 0;
$toReturn = array();
$query = "SELECT section_id FROM Form_Fields where product_category_id = $product_category_id group by section_id;";
$res = $pdo->prepare($query);
$res->execute();
$sections = $res->fetchAll(PDO::FETCH_ASSOC);
foreach ($sections as $section) {
    $section_id = $section['section_id'];
    $query = "SELECT name FROM Form_Sections where section_id=$section_id;";
    $res = $pdo->prepare($query);
    $res->execute();
    $section_name = $res->fetch(PDO::FETCH_ASSOC);
    $section_name = $section_name['name'];



    $query = "SELECT field_id, question FROM Form_Fields where section_id=$section_id;";
    $res = $pdo->prepare($query);
    $res->execute();
    $fields = $res->fetchAll(PDO::FETCH_ASSOC);
    $sectionFields = array();
    foreach ($fields as $field) {
        $field_id = $field['field_id'];
        $field_name = $field['question'];
        $sectionFields[] = array(
            'field_id' => $field_id,
            'field_name' => $field_name
        );

    }
    $toReturn[] = array(
        'section_id' => $section_id,
        'section_name' => $section_name,
        'fields' => $sectionFields
    );
}
echo json_encode($toReturn);



?>
