<?php
require_once('Models/LoadData.php');
include_once("Views/tiles/salesRepTile.php");

if (isset($_POST["page"])){
    $page = $_POST["page"];
} else {
    $page = 1;
}
$view = new stdClass();
$view->userSearchTerm = $_POST["searchText"];

$searchResults = new LoadData();
$data = $searchResults->loadSearchData($_POST['searchText'], $page);

echo json_encode($data[0]);
echo "|";
echo json_encode($data[1]);
echo "|";
echo json_encode($data[2]);
echo "|";

foreach($data[3] as $row) {
    tile($row);
}