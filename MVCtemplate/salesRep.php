<?php
require_once('Models/Filter.php');
$view = new stdClass();
$view->pageTitle = 'Sales Representative';

$view->gameDataSet = (new Filter())->filter();
$IDs = [];
foreach ($view->gameDataSet as $gameData) {
    array_push($IDs, $gameData->getAppID());
}

$view->IDs = $IDs;
$view->$labels = ["Status", "Units available", "Units sold", "Price"];
$LazyLoad = new stdClass();
$LazyLoad->url = substr($_SERVER['PHP_SELF'], 0, -4).'Data.php?';
foreach ($_POST as $key => $value) {
    if ($key === 'page') {
        continue;
    }
    $LazyLoad->url = $LazyLoad->url.$key.'='.$value.'&';
}
$LazyLoad->url = $LazyLoad->url.'page=';

$LazyLoad->type = 'doughnut';
$LazyLoad->xValues = "['Units Sold', 'Units Available']";
$LazyLoad->chart = true;

require_once("Views/tiles/salesRepTile.php");

require_once('Views/tilePage.phtml');