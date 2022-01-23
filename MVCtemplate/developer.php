<?php
require_once('Models/Filter.php');
$view = new stdClass();
$view->pageTitle = 'Developer';

$view->labels = ["Developer", "Positive ratings", "Negative ratings", "Price"];

$LazyLoad = new stdClass();
$LazyLoad->url = substr($_SERVER['PHP_SELF'], 0, -4).'Data.php?';
foreach ($_POST as $key => $value) {
    if ($key === 'page') {
        continue;
    }
    $LazyLoad->url = $LazyLoad->url.$key.'='.$value.'&';
}
foreach ($_GET as $key => $value) {
    if ($key === 'page') {
        continue;
    }
    $LazyLoad->url = $LazyLoad->url.$key.'='.$value.'&';
}

$LazyLoad->type = 'bar';
$LazyLoad->xValues = "['Positive Ratings', 'Negative Ratings']";
$LazyLoad->chart = true;
$LazyLoad->legend = false;

require_once("Views/tiles/developerTile.php");

require_once('Views/tilePage.phtml');