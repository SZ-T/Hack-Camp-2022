<?php
require_once('Models/Filter.php');
$view = new stdClass();
$view->pageTitle = 'Data analyst';

$view->$labels = ["Release date", "Average playtime", "Median playtime", "Units sold"];

$LazyLoad = new stdClass();
$LazyLoad->url = substr($_SERVER['PHP_SELF'], 0, -4).'Data.php?';
foreach ($_POST as $key => $value) {
    if ($key === 'page') {
        continue;
    }
    $LazyLoad->url = $LazyLoad->url.$key.'='.$value.'&';
}

$LazyLoad->type = 'pie';
$LazyLoad->xValues = "['Average Playtime', 'Median Playtime']";
$LazyLoad->chart = true;
$LazyLoad->legend = true;

require_once("Views/tiles/dataAnalystTile.php");

require_once('Views/tilePage.phtml');