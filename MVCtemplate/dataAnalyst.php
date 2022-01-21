<?php
require_once('Models/Filter.php');
$view = new stdClass();
$view->pageTitle = 'Data analyst';

$view->gameDataSet = (new Filter())->filter();
$IDs = [];
foreach ($view->gameDataSet as $gameData) {
    array_push($IDs, $gameData->getAppID());
}

$view->IDs = $IDs;
$view->$labels = ["Release date", "Average playtime", "Median playtime", "Units sold"];
$LazyLoad = new stdClass();
$LazyLoad->url = substr($_SERVER['PHP_SELF'], 0, -4).'Data.php?';
foreach ($_POST as $key => $value) {
    if ($key === 'page') {
        continue;
    }
    $LazyLoad->url = $LazyLoad->url.$key.'='.$value.'&';
}
$LazyLoad->url = $LazyLoad->url.'page=';

$LazyLoad->type = 'pie';
$LazyLoad->xValues = "['Average Playtime', 'Median Playtime']";
$LazyLoad->chart = true;

require_once("Views/tiles/dataAnalystTile.php");

require_once('Views/tilePage.phtml');