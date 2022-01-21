<?php
require_once('Models/Filter.php');
$view = new stdClass();
$view->pageTitle = 'Proof reader';

$view->gameDataSet = (new Filter())->filter();
$IDs = [];
foreach ($view->gameDataSet as $gameData) {
    array_push($IDs, $gameData->getAppID());
}

$view->IDs = $IDs;
$view->$labels = ["Status", "Categories", "Tags", "Genres"];
$LazyLoad = new stdClass();
$LazyLoad->url = substr($_SERVER['PHP_SELF'], 0, -4).'Data.phps?';
foreach ($_POST as $key => $value) {
    if ($key === 'page') {
        continue;
    }
    $LazyLoad->url = $LazyLoad->url.$key.'='.$value.'&';
}
$LazyLoad->url = $LazyLoad->url.'page=';

$LazyLoad->type = '';
$LazyLoad->xValues = '""';
$LazyLoad->chart = 'false';

require_once("Views/tiles/proofReaderTile.php");

require_once('Views/tilePage.phtml');