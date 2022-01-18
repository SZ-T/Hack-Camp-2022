<?php
require_once('Models/TestData.php');
require_once('Models/Genre.php');
$view = new stdClass();
$view->pageTitle = 'Homepage';

$gameDataSet = new TestDataSet();
$view->gameDataSet = $gameDataSet->returnEight();

//$genreDataSet = new Genre();
//$view->genre = $genreDataSet->getGenreName();
//$view->genre = $genreDataSet->getGameNumber();

$genreDataSet = new TestDataSet();
$view->genreDataSet = $genreDataSet->topGenre();

$developerDataSet = new TestDataSet();
$view->developerDataSet = $developerDataSet->topDeveloper();

$platformDataSet = new TestDataSet(); 
$view->platformDataSet  = $platformDataSet->topPlatform();

$publisherDataSet = new TestDataSet();
$view->publisherDataSet = $publisherDataSet->topPublisher();

require_once('Views/index.phtml');