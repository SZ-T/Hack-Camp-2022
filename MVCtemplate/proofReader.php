<?php
require_once('Models/TestData.php');
require_once('Models/TestData.php');
$view = new stdClass();
$view->pageTitle = 'Proof reader';

$gameDataSet = new TestDataSet();
$view->gameDataSet = $gameDataSet->TestDatabase();
$IDs = [];
foreach ($view->gameDataSet as $gameData) {
    array_push($IDs, $gameData->getAppID());
}

echo json_encode($IDs);

require_once("Views/tiles/proofReaderTile.php");

require_once('Views/tilePage.phtml');