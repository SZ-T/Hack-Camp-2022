<?php
require_once('Models/TestData.php');
$view = new stdClass();
$view->pageTitle = 'CardViewTest';

$gameDataSet = new TestDataSet();
$view->gameDataSet = $gameDataSet->TestDatabase2();

require_once('Views/proofReader.phtml');