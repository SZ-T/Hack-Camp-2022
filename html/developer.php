<?php
require_once('Models/Filter.php');
$view = new stdClass();
$view->pageTitle = 'Developer';

if (isset($_REQUEST["searchText"])) {
    $view->userSearchTerm = $_REQUEST["searchText"];
}
$view->labels = ["Developer", "Positive ratings", "Negative ratings", "Price"];
$view->url = $_SERVER['PHP_SELF'].'?';

$LazyLoad = new stdClass();
$LazyLoad->url = substr($_SERVER['PHP_SELF'], 0, -4).'Data.php?';
$LazyLoad->data = '';
foreach ($_REQUEST as $key => $value) {
    if ($key === 'page') {
        continue;
    }
    $LazyLoad->data = $LazyLoad->data.$key.'='.$value.'&';
    $view->url = $view->url.$key.'='.$value.'&';
}
$LazyLoad->data = $LazyLoad->data.'page=';

$LazyLoad->type = 'bar';
$LazyLoad->xValues = "['Positive Ratings', 'Negative Ratings']";
$LazyLoad->chart = true;
$LazyLoad->legend = false;

require_once('Views/tilePage.phtml');