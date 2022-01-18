<?php
require_once('Models/TestData.php');
$view = new stdClass();
$view->pageTitle = 'Data analyst';

$gameDataSet = new TestDataSet();
$view->gameDataSet = $gameDataSet->TestDatabase();

require_once("Views/tiles/dataAnalystTile.php");

require_once('Views/tilePage.phtml');