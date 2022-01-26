<?php
require_once('Models/TestData.php');
require_once('Models/Genre.php');
$view = new stdClass();
$view->pageTitle = 'Homepage';


$genreDataSet = new TestDataSet();
$view->genreDataSet = $genreDataSet->topGenre();

$developerDataSet = new TestDataSet();
$view->developerDataSet = $developerDataSet->topDeveloper();

$platformDataSet = new TestDataSet(); 
$view->platformDataSet  = $platformDataSet->topPlatform();

$publisherDataSet = new TestDataSet();
$view->publisherDataSet = $publisherDataSet->topPublisher();

foreach($view->platformDataSet as $platformData)
{
    $view->total = $view->total + $platformData->getPlatformNumber();
}
require_once('Views/index.phtml');