<?php
require_once('Models/Filter.php');
require_once("Views/tiles/proofReaderTile.php");

if (isset($_POST["page"])){
    $page = $_POST["page"];
} else {
    $page = 1;
}

$gameDataSet = (new Filter())->filter($page);

foreach($gameDataSet as $gameData) {
    echo tile($gameData);
}
