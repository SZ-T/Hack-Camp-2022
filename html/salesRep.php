<?php
require_once('Models/Filter.php');
$view = new stdClass();
$view->pageTitle = 'Sales Representative';

if (isset($_REQUEST["searchText"])) {
    $view->userSearchTerm = $_REQUEST["searchText"];
}
$view->labels = ["Status", "Units available", "Units sold", "Price"];
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

$LazyLoad->type = 'doughnut';
$LazyLoad->xValues = "['Units Sold', 'Units Available']";
$LazyLoad->chart = true;
$LazyLoad->legend = true;

require_once('Views/tilePage.phtml');