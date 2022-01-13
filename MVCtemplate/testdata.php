<?php
require_once('Models/TestData.php');
$view = new stdClass();
$view->pageTitle = 'Test';

$gameDataSet = new TestDataSet();
$view->gameDataSet = $gameDataSet->TestDatabase();

//$gameDataSet2 = new TestDataSet();
//$view->gameDataSet2 = $gameDataSet2->TestDatabase2();

require_once('Views/testdata.phtml');