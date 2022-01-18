<?php
require_once('Models/TestData.php');
$view = new stdClass();
$view->pageTitle = 'Proof reader';

$gameDataSet = new TestDataSet();
$view->gameDataSet = $gameDataSet->TestDatabase();

require_once("Views/tiles/proofReaderTile.php");

require_once('Views/tilePage.phtml');