<?php
require_once('Models/Filter.php');
$view = new stdClass();
$view->pageTitle = 'Developer';

$view->gameDataSet = (new Filter())->filter();
$IDs = [];
foreach ($view->gameDataSet as $gameData) {
    array_push($IDs, $gameData->getAppID());
}

$view->IDs = $IDs;
$view->$labels = ["Developer", "Positive ratings", "Negative ratings", "Price"];
$LazyLoad = new stdClass();
$LazyLoad->url = substr($_SERVER['PHP_SELF'], 0, -4).'Data.php?';
foreach ($_POST as $key => $value) {
    if ($key === 'page') {
        continue;
    }
    $LazyLoad->url = $LazyLoad->url.$key.'='.$value.'&';
}
$LazyLoad->url = $LazyLoad->url.'page=';

$LazyLoad->type = 'bar';
$LazyLoad->xValues = "['Positive Ratings', 'Negative Ratings']";
$LazyLoad->chart = true;

require_once("Views/tiles/developerTile.php");

require_once('Views/tilePage.phtml');