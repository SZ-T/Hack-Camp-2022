<?php
require_once('Models/TestData.php');
$view = new stdClass();
$view->pageTitle = 'Test';

$gameDataSet = new TestDataSet();
$view->gameDataSet = $gameDataSet->TestDatabase();

require_once('Views/testCardLayout.phtml');