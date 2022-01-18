<?php
require_once('Models/TestData.php');
$view = new stdClass();
$view->pageTitle = 'Developer';

$gameDataSet = new TestDataSet();
$view->gameDataSet = $gameDataSet->TestDatabase();

require_once("Views/tiles/developerTile.php");

require_once('Views/tilePage.phtml');