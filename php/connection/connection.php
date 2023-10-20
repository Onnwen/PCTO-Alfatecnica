<?php
$db = [
    'db_engine' => 'mysql',
    'db_host' => '15.188.73.19',
    'db_name' => 'alfatecnica2',
    'db_user' => 'alfatecnica',
    'db_password' => '$Yne&Fu8hGVqu935rXeJV8Fo5',
];

$db_config = $db['db_engine'] . ":host=".$db['db_host'] . ";dbname=" . $db['db_name'];

try {
    $pdo = new PDO($db_config, $db['db_user'], $db['db_password'], [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    exit("Impossibile connettersi al database: " . $e->getMessage());
}
 ?>
