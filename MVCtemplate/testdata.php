<?php
require_once('Models/TestData.php');

$view = new stdClass();
$view->pageTitle = 'Test';

$gameDataSet = new TestDataSet();
$view->gameDataSet = $gameDataSet->TestDatabase();

$gameDataSet2 = new TestDataSet();
$view->gameDataSet2 = $gameDataSet2->TestDatabase2();

$genreDataSet = new TestDataSet();
$view->genreDataSet = $genreDataSet->topGenre();

$publisherDataSet = new TestDataSet();
$view->publisherDataSet = $publisherDataSet->topPublisher();

$developerDataSet = new TestDataSet();
$view->developerDataSet = $developerDataSet->topDeveloper();

$platformDataSet = new TestDataSet(); 
$view->platformDataSet  = $platformDataSet->topPlatform();

//$total=0;
foreach($view->platformDataSet as $platformData)
{
    $view->total = $view->total + $platformData->getPlatformNumber();
}
               

var_dump($view->developerDataSet);
require_once('Views/testdata.phtml');