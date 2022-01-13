<?php
require_once('Models/TestData.php');
$view = new stdClass();
$view->pageTitle = 'Sales Representative';

$gameDataSet = new TestDataSet();
$view->gameDataSet = $gameDataSet->TestDatabase();

require_once('Views/salesRep.phtml');