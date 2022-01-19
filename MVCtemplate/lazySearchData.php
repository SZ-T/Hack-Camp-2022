<?php
require_once('Models/LoadData.php');
include_once("Views/tiles/searchTile.php");

if (isset($_POST["page"])){
    $page = $_POST["page"];
} else {
    $page = 1;
}

$searchResults = new LoadData();
$data = $searchResults->loadSearchData($_POST['searchText'], $page);

foreach($data as $row) {
    tile($row);
}