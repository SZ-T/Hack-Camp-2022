<?php

require_once("Models/Database.php");

$_dbInstance = Database::getInstance();
$_dbHandle = $_dbInstance->getdbConnection();

$sqlQuery = 'SELECT devName from developers WHERE devName LIKE ?';
$statement = $_dbHandle->prepare($sqlQuery);
$statement->execute([$_POST["data"]."%"]);
$attributeList = $statement->fetchAll();
$array = [];
foreach ($attributeList as $row) {
    $array[] = $row['devName'];
}

echo json_encode($array);